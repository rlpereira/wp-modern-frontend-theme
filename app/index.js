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
  this.mkdir('app');
  this.mkdir('app/templates');

  this.template('css/_style.css', "style.css");
  this.template('php/_index.php', "index.php");

  this.copy('_package.json', 'package.json');
  this.copy('_bower.json', 'bower.json');
};

WpModernFrontendThemeGenerator.prototype.projectfiles = function projectfiles() {
  this.copy('editorconfig', '.editorconfig');
  this.copy('jshintrc', '.jshintrc');
};
