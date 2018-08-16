'use strict';

const merge = require('webpack-merge');
const prodEnv = require('./prod.env');
const dotEnv = require('dotenv').load({path: './../.env'}).parsed;

for(let key in dotEnv){
  if(dotEnv.hasOwnProperty(key)) {
    switch (dotEnv[key]) {
      case "true":
        dotEnv[key] = true;
        break;

      case "false":
        dotEnv[key] = false;
        break;

      default:
        dotEnv[key] = `\"${dotEnv[key]}\"`;
        break;
    }
  }
}
module.exports = merge(prodEnv, dotEnv, {
  NODE_ENV: '"development"',
});
