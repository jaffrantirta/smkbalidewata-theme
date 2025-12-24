const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const TerserPlugin = require("terser-webpack-plugin");

const isProduction = process.env.NODE_ENV === "production";

module.exports = {
  mode: isProduction ? "production" : "development",

  entry: {
    app: "./src/js/app.js",
  },

  output: {
    path: path.resolve(__dirname, "assets"),
    filename: "js/[name].js",
    clean: false,
  },

  devtool: isProduction ? false : "source-map",

  module: {
    rules: [
      // JavaScript
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },

      // CSS (for Swiper and PhotoSwipe styles)
      {
        test: /\.css$/,
        use: [MiniCssExtractPlugin.loader, "css-loader"],
      },

      // Assets
      {
        test: /\.(png|jpg|jpeg|gif|svg|woff|woff2|eot|ttf|otf)$/,
        type: "asset/resource",
        generator: {
          filename: "assets/[name][ext]",
        },
      },
    ],
  },

  plugins: [
    new MiniCssExtractPlugin({
      filename: "css/gallery.css", // Combined file for Swiper and PhotoSwipe styles
    }),
  ],

  optimization: {
    minimize: isProduction,
    minimizer: [new TerserPlugin(), new CssMinimizerPlugin()],
  },
};
