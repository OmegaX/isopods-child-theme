'use strict'

const path = require('path');
const { babel } = require('@rollup/plugin-babel');
const { nodeResolve } = require('@rollup/plugin-node-resolve');
const commonjs = require( '@rollup/plugin-commonjs' );
const multi = require( '@rollup/plugin-multi-entry' );
const replace = require('@rollup/plugin-replace');
const banner = require('./banner.js');

let fileDest = '../../assets/js/theme.js'
const external = ['jquery']
const plugins = [
  babel({
    // Only transpile our source code
    exclude: 'node_modules/**',
    // Include the helpers in the bundle, at most one copy of each
    babelHelpers: 'bundled'
  }),
  replace({
      'process.env.NODE_ENV': '"production"',
      preventAssignment: true
  }),
  nodeResolve(),
  commonjs(),
  multi()
]
const globals = {
  jquery: 'jQuery', // Ensure we use jQuery which is always available even in noConflict mode
}


module.exports = {
  input: [
    path.resolve(__dirname, '../js/responsive-background-images.min.js'),
    path.resolve(__dirname, '../js/parallax.min.js'),
    path.resolve(__dirname, '../js/wickedpicker.js'),
    path.resolve(__dirname, '../js/magnify.js'),
    path.resolve(__dirname, '../js/bsdatepicker.js'),
    path.resolve(__dirname, '../js/typewriter.js'),
    path.resolve(__dirname, '../js/jquery.pretty-break.js'),
    path.resolve(__dirname, '../js/skip-link-focus-fix.js'),
    path.resolve(__dirname, '../js/custom.js')
  ],
  output: {
    banner,
    file: path.resolve(__dirname, fileDest),
    format: 'umd',
    globals,
    name: 'understrap'
  },
  external,
  plugins
}