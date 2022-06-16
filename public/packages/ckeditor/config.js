/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.pasteUploadFileApi = '../../uploads';
	
	//插件是codesnippet的依赖插件，所以必须也添加这几个插件代码高亮才能正常使用
	//添加插件，多个插件用逗号隔开
	config.extraPlugins = 'codesnippet,codesnippetgeshi,codemirror';
	//config.extraPlugins = 'codesnippet,codesnippetgeshi';
	//设置高亮风格, 如果不设置着默认风格为default
	//config.codeSnippet_theme = 'pojoaque';
	config.codeSnippet_theme = 'monokai_sublime';
	config.codeSnippet_languages = {
		javascript: 'JavaScript',
		php: 'PHP',
		go: 'Go',
		java: 'Java',
	};
};