(function($) {
if (elFinder && elFinder.prototype.options && elFinder.prototype.options.i18n) 
	elFinder.prototype.options.i18n.es = {
		/* errors */
		'Root directory does not exists'        : 'El directorio raíz no existe',
		'Unable to connect to backend'          : 'No se ha podido establecer la conexión con el servidor',
		'Access denied'                         : 'Acceso denegado',
		'Invalid backend configuration'         : 'La respuesta del servidor es incorrecta',
		'Unknown command'                       : 'Comando desconocido',
		'Command not allowed'                   : 'No puede ejecutar este comando',
		'Invalid parameters'                    : 'Parámetros incorrectos',
		'File not found'                        : 'Fichero no encontrado',
		'Invalid name'                          : 'Nombre incorrecto',
		'File or folder with the same name already exists' : 'Ya existe un fichero o un directorio con este nombre',
		'Unable to rename file'                 : 'No se ha podido cambiar el nombre al directorio',
		'Unable to create folder'               : 'No se ha podido crear el directorio',
		'Unable to create file'                 : 'No se ha podido crear el fichero',  
		'No file to upload'                     : 'No hay ficheros para subir',
		'Select at least one file to upload'    : 'Seleccione, como mínimo un fichero, para subir',
		'File exceeds the maximum allowed filesize' : 'El tamaño del fichero es más grande que el tamaño máximo autorizado',
		'Data exceeds the maximum allowed size' : 'Los datos exceden el tamaño máximo permitido',
		'Not allowed file type'                 : 'Tipo de fichero no permitido',
		'Unable to upload file'                 : 'No se ha podido subir el fichero',
		'Unable to upload files'                : 'No se han podido subir los ficheros',
		'Unable to remove file'                 : 'No se ha podido eliminar el fichero',
		'Unable to save uploaded file'          : 'No se ha podido guardar el fichero subido',
		'Some files was not uploaded'           : 'Algunos ficheros no han podido ser subidos',
		'Unable to copy into itself'            : 'No se puede copiar dentro de sí mismo',
		'Unable to move files'                  : 'No se ha podido mover los ficheros',
		'Unable to copy files'                  : 'No se ha podido copiar los ficheros',
		'Unable to create file copy'            : 'No se ha podido crear copia del fichero',
		'File is not an image'                  : 'Este fichero no es una imagen',
		'Unable to resize image'                : 'No se han podido cambiar las dimensiones de la imagen',
		'Unable to write to file'               : 'No se ha podido escribir el fichero',
		'Unable to create archive'              : 'No se ha podido crear el archivo',
		'Unable to extract files from archive'  : 'No se ha podido extraer fichero desde archivo',
		'Unable to open broken link'            : 'No se puede abrir un enlace roto',
		'File URL disabled by connector config' : 'El acceso a las rutas de los ficheros está prohibido en la configuración del conector',
		/* statusbar */
		'items'          : 'objetos',
		'selected items' : 'objetos seleccionados',
		/* commands/buttons */
		'Back'                    : 'Atrás',
		'Reload'                  : 'Refrescar',
		'Open'                    : 'Abrir',
		'Preview with Quick Look' : 'Vista previa',
		'Select file'             : 'Seleccionar fichero',
		'New folder'              : 'Nueva carpeta',
		'New text file'           : 'Nuevo fichero',
		'Upload files'            : 'Subir ficheros',
		'Copy'                    : 'Copiar',
		'Cut'                     : 'Cortar',
		'Paste'                   : 'Pegar',
		'Duplicate'               : 'Duplicar',
		'Remove'                  : 'Eliminar',
		'Rename'                  : 'Cambiar nombre',
		'Edit text file'          : 'Editar fichero',
		'View as icons'           : 'Iconos',
		'View as list'            : 'Lista',
		'Resize image'            : 'Tamaño de imagen',
		'Create archive'          : 'Nuevo archivo',
		'Uncompress archive'      : 'Extraer archivo',
		'Get info'                : 'Propiedades',
		'Help'                    : 'Ayuda',
		'Dock/undock filemanger window' : 'Despegar/pegar el gestor de ficheros a la página',
		/* upload/get info dialogs */
		'Maximum allowed files size' : 'Tamaño máximo del fichero',
		'Add field'   : 'Añadir campo',
		'File info'   : 'Propiedades de fichero',
		'Folder info' : 'Propiedades de carpeta',
		'Name'        : 'Nombre',
		'Kind'        : 'Tipo',
		'Size'        : 'Tamaño',
		'Modified'    : 'Modificado',
		'Permissions' : 'Acceso',
		'Link to'     : 'Enlaza con',
		'Dimensions'  : 'Dimensiones',
		'Confirmation required' : 'Se requiere confirmación',
		'Are you shure you want to remove files?<br /> This cannot be undone!' : '¿Está seguir que desea eliminar el fichero? <br />Esta acción es irreversible.',
		/* permissions */
		'read'        : 'lectura',
		'write'       : 'escritura',
		'remove'      : 'eliminación',
		/* dates */
		'Jan'         : 'Ene',
		'Feb'         : 'Feb',
		'Mar'         : 'Mar',
		'Apr'         : 'Abr',
		'May'         : 'May',
		'Jun'         : 'Jun',
		'Jul'         : 'Jul',
		'Aug'         : 'Ago',
		'Sep'         : 'Sep',
		'Oct'         : 'Oct',
		'Nov'         : 'Nov',
		'Dec'         : 'Dec',
		'Today'       : 'Hoy',
		'Yesterday'   : 'Ayer',
		/* mimetypes */
		'Unknown'                           : 'Desconocido',
		'Folder'                            : 'Carpeta',
		'Alias'                             : 'Enlace',
		'Broken alias'                      : 'Enlace roto',
		'Plain text'                        : 'Texto',
		'Postscript document'               : 'Documento postscript',
		'Application'                       : 'Aplicación',
		'Microsoft Office document'         : 'Documento Microsoft Office',
		'Microsoft Word document'           : 'Documento Microsoft Word',  
		'Microsoft Excel document'          : 'Documento Microsoft Excel',
		'Microsoft Powerpoint presentation' : 'Documento Microsoft Powerpoint',
		'Open Office document'              : 'Documento Open Office',
		'Flash application'                 : 'Aplicación Flash',
		'XML document'                      : 'Documento XML',
		'Bittorrent file'                   : 'Fichero bittorrent',
		'7z archive'                        : 'Archivo 7z',
		'TAR archive'                       : 'Archivo TAR',
		'GZIP archive'                      : 'Archivo GZIP',
		'BZIP archive'                      : 'Archivo BZIP',
		'ZIP archive'                       : 'Archivo ZIP',
		'RAR archive'                       : 'Archivo RAR',
		'Javascript application'            : 'Aplicación Javascript',
		'PHP source'                        : 'Documento PHP',
		'HTML document'                     : 'Documento HTML',
		'Javascript source'                 : 'Documento Javascript',
		'CSS style sheet'                   : 'Documento CSS',
		'C source'                          : 'Documento C',
		'C++ source'                        : 'Documento C++',
		'Unix shell script'                 : 'Script Unix shell',
		'Python source'                     : 'Documento Python',
		'Java source'                       : 'Documento Java',
		'Ruby source'                       : 'Documento Ruby',
		'Perl script'                       : 'Script Perl',
		'BMP image'                         : 'Imagen BMP',
		'JPEG image'                        : 'Imagen JPEG',
		'GIF Image'                         : 'Imagen GIF',
		'PNG Image'                         : 'Imagen PNG',
		'TIFF image'                        : 'Imagen TIFF',
		'TGA image'                         : 'Imagen TGA',
		'Adobe Photoshop image'             : 'Imagen Adobe Photoshop',
		'MPEG audio'                        : 'Audio MPEG',
		'MIDI audio'                        : 'Audio MIDI',
		'Ogg Vorbis audio'                  : 'Audio Ogg Vorbis',
		'MP4 audio'                         : 'Audio MP4',
		'WAV audio'                         : 'Audio WAV',
		'DV video'                          : 'Video DV',
		'MP4 video'                         : 'Video MP4',
		'MPEG video'                        : 'Video MPEG',
		'AVI video'                         : 'Video AVI',
		'Quicktime video'                   : 'Video Quicktime',
		'WM video'                          : 'Video WM',
		'Flash video'                       : 'Video Flash',
		'Matroska video'                    : 'Video Matroska',
		// 'Shortcuts' : 'Клавиши',		
		'Select all files' : 'Seleccionar todos ficheros',
		'Copy/Cut/Paste files' : 'Copiar/Cortar/Pegar ficheros',
		'Open selected file/folder' : 'Abrir carpeta/fichero',
		'Open/close QuickLook window' : 'Abrir/Cerrar la ventana de vista previa',
		'Remove selected files' : 'Eliminar ficheros seleccionados',
		'Selected files or current directory info' : 'Información sobre los ficheros seleccionados en la carpeta actual',
		'Create new directory' : 'Nueva carpeta',
		'Open upload files form' : 'Abrir ventana para subir ficheros',
		'Select previous file' : 'Seleccionar el fichero anterior',
		'Select next file' : 'Seleccionar el fichero siguiente',
		'Return into previous folder' : 'Volver a la carpeta anterior',
		'Increase/decrease files selection' : 'Aumentar/disminuir la selección de ficheros',
		'Authors'                       : 'Autores',
		'Sponsors'  : 'Colaboradores',
		'elFinder: Web file manager'    : 'elFinder: Gestor de ficheros para la web',
		'Version'                       : 'Versión',
		'Copyright: Studio 42 LTD'      : 'Copyright: Studio 42',
		'Donate to support project development' : 'Ayuda al desarrollo',
		'Javascripts/PHP programming: Dmitry (dio) Levashov, dio@std42.ru' : 'Programación Javascripts/php: Dmitry (dio) Levashov, dio@std42.ru',
		'Python programming, techsupport: Troex Nevelin, troex@fury.scancode.ru' : 'Programación Python, soporte técnico: Troex Nevelin, troex@fury.scancode.ru',
		'Design: Valentin Razumnih'     : 'Diseño: Valentin Razumnyh',
		'Spanish localization'          : 'Traducción al español',
		'Icons' : 'Iconos',
		'License: BSD License'          : 'Licencia: BSD License',
		'elFinder documentation'        : 'Documentación elFinder',
		'Simple and usefull Content Management System' : 'Un CMS sencillo y cómodo',
		'Support project development and we will place here info about you' : 'Ayude al desarrollo del producto y la información sobre usted aparecerá aqui.',
		'Contacts us if you need help integrating elFinder in you products' : 'Pregúntenos si quiere integrar elFinder en su producto.',
		'elFinder support following shortcuts' : 'elFinder soporta los siguientes atajos de teclado',
		'helpText' : 'elFinder funciona igual que el gestor de ficheros de su PC. <br />Puede manipular los ficheros con la ayuda del panel superior, el menu o bien con atajos de teclado. Para mover fichero/carpetas simplemente arrastrelos a la carpeta deseada.	Si simultáneamente presiona la tecla Shift los ficheros se copiarán.'	
		};
	
})(jQuery);