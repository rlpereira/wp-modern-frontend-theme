'use strict';
var util = require('util');
var path = require('path');
var yeoman = require('yeoman-generator');


var WpModernFrontendThemeGenerator = module.exports = function WpModernFrontendThemeGenerator(args, options, config) {
  yeoman.generators.Base.apply(this, arguments);

  this.on('end', function () {
    this.installDependencies({ skipInstall: options['skip-install'] });
  });

  this.pkg = JSON.parse(this.readFileAsString(path.join(__dirname, '../package.json')));
};

util.inherits(WpModernFrontendThemeGenerator, yeoman.generators.Base);

WpModernFrontendThemeGenerator.prototype.askFor = function askFor() {
  var cb = this.async();

  // have Yeoman greet the user.
  console.log(this.yeoman);

  var prompts = [{
    name: 'blogName',
    message: 'What is your Blogs name?',
  }];

  this.prompt(prompts, function (props) {
    this.blogName = props.blogName;

    cb();
  }.bind(this));
};

WpModernFrontendThemeGenerator.prototype.app = function app() {
  //  creating root paths
  this.mkdir('app');
  this.mkdir('app/templates');

  this.mkdir('admin');
  this.mkdir('admin/controllers');
  this.mkdir('admin/models');
  this.mkdir('admin/views'); 

  //  creating assets paths
  this.mkdir('app/assets');
  this.mkdir('app/assets/css');
  this.mkdir('app/assets/js');

  //  copying styles
  this.template('css/_style.css', "style.css");
  this.template('css/_main.css', "app/assets/css/theme.css");

  // copying scripts
  this.template('js/_theme.js', "app/assets/js/app.js");
  
  //  cloning php
  this.template('php/_index.php', "index.php");
  this.template('php/_functions.php', "functions.php");

  //  including tools
  this.template('Gruntfile.js', 'Gruntfile.js');
  this.template('_bower.json', 'bower.json');
  this.template('_config.json', 'config.json');
  this.template('_package.json', 'package.json');

  // others stuff
  this.copy('_package.json', 'package.json');
  this.copy('_bower.json', 'bower.json');
};

WpModernFrontendThemeGenerator.prototype.projectfiles = function projectfiles() {
  this.copy('editorconfig', '.editorconfig');
  this.copy('jshintrc', '.jshintrc');
};