const path = require("path"),
	webpack = require('webpack'),
	TerserPlugin = require('terser-webpack-plugin'),
	MiniCssExtractPlugin = require('mini-css-extract-plugin'),
	ReactRefreshWebpackPlugin = require('@pmmmwh/react-refresh-webpack-plugin'),
	CopyPlugin = require('copy-webpack-plugin'),
	ReplaceInFileWebpackPlugin = require('replace-in-file-webpack-plugin'),
	{ CleanWebpackPlugin } = require('clean-webpack-plugin'),
	WriteAssetsWebpackPlugin = require('write-assets-webpack-plugin'),
	yaml = require('js-yaml'),
	fs = require('fs')

const package = require('./package.json')
const packageName = package.name

const isDev = process.env.NODE_ENV === "development"

let devUrl = 'localhost:8085'

module.exports = {
	mode: isDev ? 'development' : 'production',

	devtool: isDev ? 'source-map' : false,

	entry: {
		public: path.resolve(__dirname, "src", "assets", "public", "index.tsx"),
		private: path.resolve(__dirname, "src", "assets", "private", "index.tsx")
	},

	output: {
		path: path.resolve(__dirname, packageName),
		sourceMapFilename: '[file].map',
		filename: 'assets/js/theme-[name].min.js',
		publicPath: '/wp-content/themes/wordpress_theme/',
	},

	resolve: {
		extensions: ['.tsx', '.ts', '.jsx', '.js', '.scss', '.css', '.php'],
		modules: ['node_modules'],
	},

	devtool: isDev ? 'source-map' : false,

	plugins: [
		// clean up dist folder
		!isDev && new CleanWebpackPlugin(),

		// dump css into its own files
		new MiniCssExtractPlugin({
			filename: 'assets/css/theme-[name].min.css',
		}),

		// theme for React Hot Loader that keeps states for hooks
		isDev && new ReactRefreshWebpackPlugin({
			// disableRefreshCheck: true
		}),

		// copy all existing code over
		new CopyPlugin({
			patterns: [{ from: 'src', to: './', globOptions: { ignore: ['**/private/**', '**/public/**', '**/scss/', '**.psd'] } }],
		}),

		// dynamically change the theme class name to the package name
		packageName !== 'wordpress_theme' ? new ReplaceInFileWebpackPlugin([{
			dir: packageName,
			test: /\.php$/,
			rules: [
				{
					search: /wordpress_theme/g,
					replace: packageName
				}
			]
		}]) : false,

		// force dev-server to write php files to disk when developing
		isDev && new WriteAssetsWebpackPlugin({ force: true, extension: ['php'] }),

	].filter(Boolean),

	externals: {
		// jquery is loaded by WordPress
		jquery: 'jQuery'
	},

	optimization: {
		minimize: !isDev,
		minimizer: [
			// https://webpack.js.org/plugins/terser-webpack-plugin/
			!isDev && new TerserPlugin({
				terserOptions: {
					output: {
						comments: false,
					},
				},
				extractComments: false,
			}),
		].filter(Boolean),
	},

	module: {
		rules: [
			{
				test: /\.tsx?$/,
				exclude: /node_modules/,
				use: 'babel-loader',
			},
			{
				test: /\.html$/,
				use: 'html-loader'
			},
			{
				test: /\.(sa|sc|c)ss$/,
				use: [
					{
						loader: MiniCssExtractPlugin.loader,
						options: {
							hmr: isDev,
							esModule: true,
						},
					},
					'css-loader',
					'sass-loader'
				],
			},
			{
				test: /\.(png|svg|jpg|gif)$/,
				loader: 'file-loader',
				options: {
					name: 'assets/img/[name].[ext]',
					esModule: false,
				},
			},
		]
	},

	devServer: {
		hot: true,
		inline: true,
		port: 3000,
		proxy: {
			context: () => true,
			target: `http://${devUrl}/`,
		},
	},
}