<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog Forums Plugin 2.8.0                                               |
// +---------------------------------------------------------------------------+
// | spanish.php                                                               |
// | Language defines for all text                                             |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2007 by the following authors:                              |
// |    jrvalverde                                                             |
// |                                                                           |
// | Copyright (C) 2000,2001 by the following authors:                         |
// |    Tony Bibbs       tony AT tonybibbs DOT com                             |
// |                                                                           |
// | Forum Plugin Authors                                                      |
// |    Mr.GxBlock                                        www.gxblock.com      |
// |    Matthew DeWyer   matt AT mycws DOT com            www.cweb.ws          |
// |    Blaine Lang      geeklog AT langfamily DOT ca     www.langfamily.ca    |
// +---------------------------------------------------------------------------+
// | This program is free software; you can redistribute it and/or             |
// | modify it under the terms of the GNU General Public License               |
// | as published by the Free Software Foundation; either version 2            |
// | of the License, or (at your option) any later version.                    |
// |                                                                           |
// | This program is distributed in the hope that it will be useful,           |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             |
// | GNU General Public License for more details.                              |
// |                                                                           |
// | You should have received a copy of the GNU General Public License         |
// | along with this program; if not, write to the Free Software Foundation,   |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.           |
// +---------------------------------------------------------------------------+

global $LANG32;

$PLG_forum_MESSAGE1 = 'Actualización del plugin Forum completada - sin errores';
$PLG_forum_MESSAGE2 = 'Actualización de plugin Foro: No hemos podido actualizar esta versión automáticamente. Consulta la documentación del Plugin.';
$PLG_forum_MESSAGE5 = 'Actualización del plugin Forum fallida - revisa error.log';
$PLG_forum_MESSAGE3002 = $LANG32[9];

$LANG_GF00 = array (
    'pluginlabel'       => 'Foro',         // What shows up in the siteHeader
    'searchlabel'       => 'Foro',
    'statslabel'        => 'Total de mensajes en el foro',
    'statsheading1'     => '10 temas más visitados',
    'statsheading2'     => '10 temas más comentados',
    'statsheading3'     => 'No hay temas sobre los que informar',
    'useradminmenu'     => 'Características del foro',
    'access_denied'     => 'Acceso Denegado',
    'autotag_desc_forum' => '[forum: id alternate title] - Displays a link to a forum topic using the text \'here\' as the title. An alternate title may be specified but is not required.'
);


$LANG_GF01['FORUM']          = 'Foro';
$LANG_GF01['ALL']            = 'Todo'; 
$LANG_GF01['YES']            = 'Si';
$LANG_GF01['NO']             = 'No';
$LANG_GF01['NEW']            = 'Nuevo';
$LANG_GF01['NEXT']           = 'Siguiente';
$LANG_GF01['ERROR']          = '¡Error!';
$LANG_GF01['CONFIRM']        = 'Confirmar';
$LANG_GF01['UPDATE']         = 'Actualizar';
$LANG_GF01['SAVE']           = 'Guardar';
$LANG_GF01['CANCEL']         = 'Cancelar';
$LANG_GF01['ON']             = 'En: ';
$LANG_GF01['ON2']            = '&nbsp;&nbsp;<b>En: </b>';
$LANG_GF01['BY']             = 'Por: ';
$LANG_GF01['RE']             = 'Re: ';
$LANG_GF01['DATE']           = 'Fecha';
$LANG_GF01['VIEWS']          = 'Visitas';
$LANG_GF01['REPLIES']        = 'Respuestas';
$LANG_GF01['NAME']           = 'Nombre:';
$LANG_GF01['DESCRIPTION']    = 'Descripción: ';
$LANG_GF01['TOPIC']          = 'Tópico';
$LANG_GF01['TOPICS']         = 'Tópicos:';
$LANG_GF01['TOPICSUBJECT']   = 'Tema del tópico';
$LANG_GF01['HOMEPAGE']       = 'Inicio';
$LANG_GF01['SUBJECT']        = 'Tema';
$LANG_GF01['HELLO']          = 'Hola ';
$LANG_GF01['MOVED']          = 'Movido';
$LANG_GF01['POSTS']          = 'Mensajes';
$LANG_GF01['LASTPOST']       = 'Último mensaje';
$LANG_GF01['POSTEDON']       = 'Enviado en';
$LANG_GF01['POSTEDBY']       = 'Enviado por';
$LANG_GF01['PAGES']          = 'Páginas';
$LANG_GF01['TODAY']          = 'Hoy a ';
$LANG_GF01['REGISTERED']     = 'Identificado';
$LANG_GF01['ORDERBY']        = 'Orden:&nbsp;';
$LANG_GF01['ORDER']          = 'Orden:';
$LANG_GF01['USER']           = 'Usuario/a';
$LANG_GF01['GROUP']          = 'Grupo';
$LANG_GF01['ANON']           = 'Anónimo: ';
$LANG_GF01['ADMIN']          = 'Admin';
$LANG_GF01['AUTHOR']         = 'Autor';
$LANG_GF01['NOMOOD']         = 'Sin ánimo';
$LANG_GF01['REQUIRED']       = '[Requerido]';
$LANG_GF01['OPTIONAL']       = '[Opcional]';
$LANG_GF01['SUBMIT']         = 'Enviar';
$LANG_GF01['PREVIEW']        = 'Vista previa';
$LANG_GF01['REMOVE']         = 'Eliminar';
$LANG_GF01['EDIT']           = 'Editar';
$LANG_GF01['DELETE']         = 'Borrar';
$LANG_GF01['OPTIONS']        = 'Opciones:';
$LANG_GF01['MISSINGSUBJECT'] = 'Sin tema';
$LANG_GF01['MIGRATE_NOW']    = 'Migrar Ahora';
$LANG_GF01['FILTERLIST']     = 'Lista de filtros';
$LANG_GF01['SELECTFORUM']    = 'Elegir foro';
$LANG_GF01['DELETEAFTER']    = 'Borrar después';
$LANG_GF01['TITLE']          = 'Título';
$LANG_GF01['COMMENTS']       = 'Comentarios'; 
$LANG_GF01['SUBMISSIONS']    = 'Envíos';
$LANG_GF01['HTML_FILTER_MSG']  = 'Se permite HTML Filtrado';
$LANG_GF01['HTML_FULL_MSG']  = 'Se permite todo HTML';
$LANG_GF01['HTML_MSG']       = 'Se permite HTML';
$LANG_GF01['CENSOR_PERM_MSG']  = 'Contenido censurado';
$LANG_GF01['ANON_PERM_MSG']    = 'Ver mensajes anónimos';
$LANG_GF01['POST_PERM_MSG1']    = 'Puede enviar';
$LANG_GF01['POST_PERM_MSG2']    = 'Los usuarios anónimos pueden enviar';
$LANG_GF01['GO']             = 'Ir';
$LANG_GF01['STATUS']         = 'Estado:';
$LANG_GF01['ONLINE']         = 'conectado';
$LANG_GF01['OFFLINE']        = 'desconectado';
$LANG_GF01['back2parent']    = 'Tema principal';
$LANG_GF01['forumname']      = '';   // Enter name here if you want it to show in the footer of the admin screens
$LANG_GF01['category']       = 'Categoría: ';
$LANG_GF01['loginreqview']   = '<b>Lo siento, debe %s inscribirse</a> o %s identificarse </a> para usar estos foros</b>';
$LANG_GF01['loginreqpost']   = '<b>Lo siento, debe inscribirse o identificarse para usar este foro</B>';
$LANG_GF01['nolastpostmsg']  = 'N/D';
$LANG_GF01['no_one']         = 'Ninguno.';
$LANG_GF01['back2top']       = 'Volver al principio';
$LANG_GF01['TEXTMODE']       = 'Modo Texto:';
$LANG_GF01['HTMLMODE']       = 'Modo HTML:';
$LANG_GF01['TopicPreview']   = 'Vista previa del mensaje';
$LANG_GF01['moderator']      = 'Moderador';
$LANG_GF01['admin']          = 'Admin';
$LANG_GF01['DATEADDED']      = 'Fecha de adición';
$LANG_GF01['PREVTOPIC']      = 'Tópico anterior';
$LANG_GF01['NEXTTOPIC']      = 'Tópico siguiente';
$LANG_GF01['RESYNC']         = "ReSync";
$LANG_GF01['RESYNCCAT']      = "ReSync Foros de la Categoría";  
$LANG_GF01['EDITICON']       = 'Editar';
$LANG_GF01['QUOTEICON']      = 'Cita';
$LANG_GF01['ProfileLink']    = 'Perfil';
$LANG_GF01['WebsiteLink']    = 'Website';
$LANG_GF01['PMLink']         = 'PM';
$LANG_GF01['EmailLink']      = 'Email';
$LANG_GF01['FORUMSUBSCRIBE'] = 'Subscribirse a este foro';
$LANG_GF01['FORUMUNSUBSCRIBE'] = 'Borrarse de este foro';
$LANG_GF01['FORUMSUBSCRIBE_TRUE'] = 'Subscribe:Enabled';
$LANG_GF01['FORUMSUBSCRIBE_FALSE'] = 'Subscribe:Disabled';
$LANG_GF01['NEWTOPIC']       = 'Tópico nuevo';
$LANG_GF01['POSTREPLY']      = 'Enviar respuesta';
$LANG_GF01['SubscribeLink']  = 'Subscribirse';
$LANG_GF01['unSubscribeLink'] = 'Borrarse';
$LANG_GF01['SubscribeLink_TRUE']  = 'Subscribe:Enabled';
$LANG_GF01['SubscribeLink_FALSE'] = 'Subscribe:Disabled';
$LANG_GF01['FORUMSUBSCRIBE'] = 'Seguir este foro';
$LANG_GF01['NEWTOPIC']       = 'Tópico nuevo';
$LANG_GF01['POSTREPLY']      = 'Enviar respuesta';
$LANG_GF01['SUBSCRIPTIONS']  = 'Subscripciones';
$LANG_GF01['TOP']            = 'Inicio del mensaje';
$LANG_GF01['PRINTABLE']      = 'Versión para imprimir';
$LANG_GF01['USERPREFS']      = 'Preferencias de usuario';
$LANG_GF01['SPEEDLIMIT']     = '"Tu último comentario fué hace %s segundos.<br' . XHTML . '>Hace falta que pasen al menos %s segundos entre envíos a los foros."';
$LANG_GF01['ACCESSERROR']    = 'ERROR DE ACCESO';
$LANG_GF01['ACTIONS']        = 'Acciones';
$LANG_GF01['DELETEALL']      = 'Borrar todos los registros seleccionados';
$LANG_GF01['DELCONFIRM']     = '¿Seguro que quieres Borrar los registros seleccionados?';
$LANG_GF01['DELALLCONFIRM']  = '¿Seguro que quieres borrar TODOS los registros seleccionados?';
$LANG_GF01['STARTEDBY']      = 'Iniciado por:';
$LANG_GF01['WARNING']        = 'Aviso';
$LANG_GF01['MODERATED']      = 'Moderadores: %s';
$LANG_GF01['LASTREPLYBY']    = 'Última respuesta por:&nbsp;%s';
$LANG_GF01['UID']            = 'UID';
$LANG_GF01['INDEXPAGE']      = 'Índice del foro';
$LANG_GF01['FEATURE']        = 'Característica';
$LANG_GF01['SETTING']        = 'Preferencia';
$LANG_GF01['MARKALLREAD']    = 'Marcar todos como leídos';
$LANG_GF01['MSG_NO_CAT']     = 'No Categories or Forums Defined';

// Language for bbcode toolbar
$LANG_GF01['CODE']           = 'Código';
$LANG_GF01['FONTCOLOR']      = 'Color de letra';
$LANG_GF01['FONTSIZE']       = 'Tamaño de letra';
$LANG_GF01['CLOSETAGS']      = 'Cerrar Marcas';
$LANG_GF01['CODETIP']        = 'Truco: Puedes aplicar rápidamente Estilos al texto seleccionado';
$LANG_GF01['TINY']           = 'Diminuto';
$LANG_GF01['SMALL']          = 'Pequeño';
$LANG_GF01['NORMAL']         = 'Normal';
$LANG_GF01['LARGE']          = 'Grande';
$LANG_GF01['HUGE']           = 'Inmenso';
$LANG_GF01['DEFAULT']        = 'Por defecto';
$LANG_GF01['DKRED']          = 'Rojo Oscuro';
$LANG_GF01['RED']            = 'Rojo';
$LANG_GF01['ORANGE']         = 'Naranja';
$LANG_GF01['BROWN']          = 'Marrón';
$LANG_GF01['YELLOW']         = 'Amarillo';
$LANG_GF01['GREEN']          = 'Verde';
$LANG_GF01['OLIVE']          = 'Oliva';
$LANG_GF01['CYAN']           = 'Cián';
$LANG_GF01['BLUE']           = 'Azul';
$LANG_GF01['DKBLUE']         = 'Azul Oscuro';
$LANG_GF01['INDIGO']         = 'Índigo';
$LANG_GF01['VIOLET']         = 'Violeta';
$LANG_GF01['WHITE']          = 'Blanco';
$LANG_GF01['BLACK']          = 'Negro';

$LANG_GF01['b_help']         = "Negrita: [b]texto[/b]";
$LANG_GF01['i_help']         = "Cursiva: [i]texto[/i]";
$LANG_GF01['u_help']         = "subrayado: [u]texto[/u]";
$LANG_GF01['q_help']         = "Cita: [quote]texto[/quote]";
$LANG_GF01['c_help']         = "Código: [code]código[/code]";
$LANG_GF01['l_help']         = "Lista: [list]texto[/list]";
$LANG_GF01['o_help']         = "Lista ordenada: [olist]texto[/olist]";
$LANG_GF01['p_help']         = "[img]http://image_url[/img]  o [img w=100 h=200][/img]";
$LANG_GF01['w_help']         = "Insertar URL: [url]http://url[/url] o [url=http://url]URL text[/url]";
$LANG_GF01['a_help']         = "Cerrar todas las etiquetas bbCode abiertas";
$LANG_GF01['s_help']         = "Color de texto: [color=red]texto[/color]  Truco: también puedes usar color=#FF0000";
$LANG_GF01['f_help']         = "Tamaño: [size=x-small]texto pequeño[/size]";
$LANG_GF01['h_help']         = "Pulsa para obtener ayuda detallada";


$LANG_GF02['msg01']    = 'Lo sentimos, debe inscribirse parea usar estos foros';
$LANG_GF02['msg02']    = '¡No deberías estar aquí!<br' . XHTML . '>Acceso restringido a este foro solamente';
$LANG_GF02['msg03']    = 'Please wait while you are redirected';
$LANG_GF02['msg05']    = '<center><em>Lo sentimos, aún no se ha creado ningún tópico.</em></center>';
$LANG_GF02['msg07']    = 'Usuarios conectados:';
$LANG_GF02['msg14']    = 'Lo sentimos. Se le ha prohibido realizar nuevas entradas.<br' . XHTML . '>';
$LANG_GF02['msg15']    = 'Si cree que es un error contacte con el <s href="mailto:%s?subject=Forum IP Ban">Administrador</a>.';
$LANG_GF02['msg18']    = '¡Error! No has rellenado todos los campos requeridos o eran demasiado cortos.';
$LANG_GF02['msg19']    = 'Tu mensaje ha sido enviado.';
$LANG_GF02['msg22']    = '- Notificación de envío al foro';
$LANG_GF02['msg23a']   = "Hay una respuesta a la discusión '%s' por %s.\n\nEste tópico lo inició %s en el foro %s. ";
$LANG_GF02['msg23b']   = "Hay un tópico nuevo '%s' enviado por %s en el foro %s en el servidor %s. Puedes verlo en:\n%s/forum/viewtopic.php?showtopic=%s\n";
$LANG_GF02['msg23c']   = "Puedes verlo en:\n%s/forum/viewtopic.php?showtopic=%s&lastpost=true\n";
$LANG_GF02['msg25']    = "\n¡Que tengas un gran día! \n";
$LANG_GF02['msg26']    = "\nEstas recibiendo este mensaje por que has elegido ser notificado cuando hubiera una respuesta a este tópico. ";
$LANG_GF02['msg27']    = "Para dejar de recibir notificaciones en este tópico ve a <%s> para eliminarlas.\n";
$LANG_GF02['msg33']    = 'Autor: ';
$LANG_GF02['msg36']    = 'Ánimo:';
$LANG_GF02['msg38']    = 'Avisarme de las respuestas ';
$LANG_GF02['msg40']    = '<br' . XHTML . '>Lo siento, ya has pedido que te avisemos de las respuestas a este tópico.<br' . XHTML . '><br' . XHTML . '>';
$LANG_GF02['msg44']    = '<p style="margin:0px; padding:5px;">No tienes ninguna notificación.</p>';
$LANG_GF02['msg49']    = '(Leído %s veces) ';
$LANG_GF02['msg55']    = 'Mensaje Borrado.';
$LANG_GF02['msg56']    = 'IP Prohibida.';
$LANG_GF02['msg59']    = 'Tópico normal';
$LANG_GF02['msg60']    = 'Mensaje Nuevo';
$LANG_GF02['msg61']    = 'Tópico Pegado';
$LANG_GF02['msg62']    = 'Avisarme de las respuestas';
$LANG_GF02['msg64']    = '¿Seguro que quieres borrar el tópico %s titulado: %s ?';
$LANG_GF02['msg65']    = '<br' . XHTML . '>Este es un tópico principal, así que todas las respuestas enviadas se borrarán también.';
$LANG_GF02['msg68']    = 'Nota: TEN CUIDADO AL EXPULSAR, solo los administradores tienen derecho a readmitir a alguien.';
$LANG_GF02['msg69']    = '¿Realmente quieres expulsar la dirección IP: %s?';
$LANG_GF02['msg71']    = 'No has elegido ninguna acción, elige un mensaje y entonces una acción de moderación..<br' . XHTML . '>Nota: Debes ser un moderador para realizar estas acciones.';
$LANG_GF02['msg72']    = 'Aviso, no tienes derecho a realizare esta acción de moderación.';
$LANG_GF02['msg74']    = 'Últimos %s Mensajes al Foro';
$LANG_GF02['msg75']    = ' %s Tópicos más visitados';
$LANG_GF02['msg76']    = '%s Tópics con más mensajes';
$LANG_GF02['msg77']    = '<br' . XHTML . '><p style="padding-left:10px;">¡No deberías estar aquí!<br' . XHTML . '>Acceso restringido solo a este foro.</p>';
$LANG_GF02['msg83']    = '<br' . XHTML . '><br' . XHTML . '>Necesitas identificarte para usar esta característica del foro.</p>';
$LANG_GF02['msg84']    = 'Marcar todos los tópicos como leídos';
$LANG_GF02['msg85']    = 'Página:';
$LANG_GF02['msg86']    = '&nbsp;Últimos %s mensajes&nbsp;';
$LANG_GF02['msg87']    = '<br' . XHTML . '>Aviso: Este tópico ha sido bloqueado por el moderador.<br' . XHTML . '>No se permiten más mensajes';
$LANG_GF02['msg88']    = 'Miembros del sitio';
$LANG_GF02['msg88b']   = 'Solo Actividad del Foro';
$LANG_GF02['msg89']    = 'Mis avisos activos';
$LANG_GF02['msg101']   = 'Reglas del foro:';
$LANG_GF02['msg103']   = 'Saltar a Foro:';
$LANG_GF02['msg106']   = 'Elegir un Foro';
$LANG_GF02['msg108']   = 'Foro Activo';
$LANG_GF02['msg109']   = 'Tópico bloqueado';
$LANG_GF02['msg110']   = 'Yendo a la página de corrección de mensajes..';
$LANG_GF02['msg111']   = 'Mensajes nuevos desde tu última visita';
$LANG_GF02['msg112']   = 'Ver todos los mensajes nuevos';
$LANG_GF02['msg113']   = 'Ver mensajes nuevos';
$LANG_GF02['msg114']   = 'Tópico bloqueado';
$LANG_GF02['msg115']   = 'Tópico pegado con nuevo mensaje';
$LANG_GF02['msg116']   = 'Tópico bloqueado con nuevo mensaje';
$LANG_GF02['msg117']   = 'Buscar en todo';
$LANG_GF02['msg118']   = 'Buscar en este foro';
$LANG_GF02['msg119']   = 'Resultados de la búsqueda en el Foro:';
$LANG_GF02['msg120']   = 'Mensajes más populares por';
$LANG_GF02['msg121']   = 'Todas las horas son %s. Hora actual %s.';
$LANG_GF02['msg122']   = 'Límite Popular:';
$LANG_GF02['msg123']   = 'Número de mensajes antes de llamar popular a un tópico';
$LANG_GF02['msg126']   = 'Líneas de búsqueda:';
$LANG_GF02['msg127']   = 'Número de líneas a mostrar en los resultados de la búsqueda';
$LANG_GF02['msg128']   = 'Miembros por página:';
$LANG_GF02['msg129']   = 'Pantalla de listado para los miembros';
$LANG_GF02['msg130']   = 'Ver mensajes anónimos:';
$LANG_GF02['msg131']   = 'Elegir No eliminará los mensajes anónimos';
$LANG_GF02['msg132']   = 'Avisar siempre:';
$LANG_GF02['msg133']   = 'Elegir Si permitirá la notificación automática para cualquier tópico quie crées o respondas.';
$LANG_GF02['msg134']   = 'Subscripción Añadida';
$LANG_GF02['msg135']   = 'A partir de ahora se te avisará de todos los mensajes a este foro.';
$LANG_GF02['msg136']   = 'Debes elegir un foro al que suscribirte.';
$LANG_GF02['msg137']   = 'Permitida la notificación para tópicos';
$LANG_GF02['msg138']   = '<b>Subscrito a todo el foro</b>';
$LANG_GF02['msg142']   = 'Notificación guardada.';
$LANG_GF02['msg144']   = 'Volver al tópico';
$LANG_GF02['msg146']   = 'Notificación Borrada';
$LANG_GF02['msg147']   = 'Foro [versión imprimible del tópico';
$LANG_GF02['msg148']   = 'Pulsa <a href="javascript:history.back()">AQUÍ</a> para volver';
$LANG_GF02['msg155']   = 'Sin mensajes de usuario.';
$LANG_GF02['msg156']   = 'Número total de mensajes al foro';
$LANG_GF02['msg157']   = 'Últimos 10 mensajes en el foro';
$LANG_GF02['msg158']   = 'Últimos 10 mensajes en el foro por ';
$LANG_GF02['msg159']   = '¿Estás seguro de querer BORRAR estos registros de Moderador seleccionados?';
$LANG_GF02['msg160']   = 'Ver última página del tópico';
$LANG_GF02['msg163']   = 'Mensaje movido';
$LANG_GF02['msg164']   = 'Marcar todas las categorías y tópicos como leídos';
$LANG_GF02['msg166']   = 'ERROR: tópico inválido o no encontrado';
$LANG_GF02['msg167']   = 'Opción de notificación';
$LANG_GF02['msg168']   = 'Eligiendo No se desactivan las notificaciones por email';
$LANG_GF02['msg169']   = 'Volver al listado de miembros';
$LANG_GF02['msg170']   = 'Últimos mensajes del foro';
$LANG_GF02['msg171']   = 'Error de acceso al foro';
$LANG_GF02['msg172']   = 'Tópico inexistente. Puede que haya sido borrado';
$LANG_GF02['msg173']   = 'Transfiriendo a la página de envío de mensaje..';
$LANG_GF02['msg174']   = 'imposible EXPULSAR miembro - dirección IP inválida o vacía';
$LANG_GF02['msg175']   = 'Volver al listado de foros';
$LANG_GF02['msg176']   = 'Elegir miembro';
$LANG_GF02['msg177']   = 'Todos los miembros';
$LANG_GF02['msg178']   = 'Solo mensajes iniciales';
$LANG_GF02['msg179']   = 'Contenido generado en: %s segundos';
$LANG_GF02['msg180']   = 'Alerta de envío a foro';
$LANG_GF02['msg181']   = 'No tienes acceso a ningún otro foro como moderador';
$LANG_GF02['msg182']   = 'Confirmación de moderador';
$LANG_GF02['msg183']   = 'Se ha creado un tópico nuevo en este foro: %s';
$LANG_GF02['msg184']   = 'Notificar solo una vez';
$LANG_GF02['msg185']   = 'Sólo se enviará una notificación para los foros y tópicos que tengan múltiples mensajes desde tu última visita.';
$LANG_GF02['msg186']   = 'Nuevo título de tópico';
$LANG_GF02['msg187']   = 'Volver al tópico - pulsa <a href="%s">aquí</a>';
$LANG_GF02['msg188']   = 'Pulsa para ir directamente al último mensaje';
$LANG_GF02['msg189']   = 'Error: Ya no puedes corregir este mensaje';
$LANG_GF02['msg190']   = 'Corrección silenciosa';
$LANG_GF02['msg191']   = 'Corrección no permitida. El margen de tiempo permitido ha expirado o bien necesitas derechos de moderador.';
$LANG_GF02['msg192']   = 'Completado ... Migrados %s tópicos y %s comentarioss.';
$LANG_GF02['msg193']   = 'HISTORIA&nbsp;&nbsp;A&nbsp;&nbsp;FORO&nbsp;&nbsp;MIGRACIÓN&nbsp;&nbsp;UTILIDAD';
$LANG_GF02['msg194']   = 'Foro tranquilo';
$LANG_GF02['msg195']   = 'Pulsa para saltar al foro';
$LANG_GF02['msg196']   = 'Ver el índice principal del foro';
$LANG_GF02['msg197']   = 'Marcar todos los tópicos como leídos';
$LANG_GF02['msg198']   = 'Actualizar tus preferencias del foro';
$LANG_GF02['msg199']   = 'Ver o eliminar notificaciones del foro';
$LANG_GF02['msg200']   = 'Informe de miembros del sitio';
$LANG_GF02['msg201']   = 'Tópicos populares';
$LANG_GF02['msg202']   =  'No hay mensajes nuevos';
$LANG_GF02['msg300']   = 'Your preferences have block anonymous posts enabled';
$LANG_GF02['msg301']   = 'Realy mark all categories read?';
$LANG_GF02['msg302']   = 'Realy mark all topics read?';
$LANG_GF02['PostReply']   = 'Enviar nueva respuesta';
$LANG_GF02['PostTopic']   = 'Enviar nuevo tópico';
$LANG_GF02['EditTopic']   = 'Editar tópico';
$LANG_GF02['quietforum']  = 'No hay tópicos nuevos en el foro';

$LANG_GF03 = array (
    'delete'            => 'Borrar mensaje',
    'edit'              => 'Editar mensaje',
    'move'              => 'Mover tópico',
    'split'             => 'Dividir tópico',
    'ban'               => 'Expulsar IP',
    'movetopic'         => 'Mover tópico',
    'movetopicmsg'      => '<br' . XHTML . '>Tópico a mover: "<b>%s</b>"',
    'splittopicmsg'     => '<br' . XHTML . '>Crear un tópico nuevo con este mensaje: "<b>%s</b>"<br' . XHTML . '><em>Por:</em>&nbsp;%s&nbsp <em>En:</em>&nbsp;%s',
    'selectforum'       => 'Elegir nuevo foro:',
    'lockedpost'        => 'Añadir mensaje de respuesta',
    'splitheading'      => 'Opción de dividir discusión:',
    'splitopt1'         => 'Mover todos los mensajes a aprtir de éste',
    'splitopt2'         => 'Mover solo este mensaje'
);

$LANG_GF04 = array (
    'label_forum'             => 'Perfil del foro',
    'label_location'          => 'Localización',
    'label_aim'               => 'Identidad AIM',
    'label_yim'               => 'Identidad YIM',
    'label_icq'               => 'Identidad ICQ',
    'label_msnm'              => 'Nombre MS Messenger',
    'label_interests'         => 'Intereses',
    'label_occupation'        => 'Ocupación',
);

/* Settings for Additional User profile - Instant Messenging links */
$LANG_GF05 = array ( // No used
    'aim_link'               => '&nbsp;<a href="aim:goim?screenname=',
    'aim_linkend'            => '>',
    'aim_hello'              => '&amp;message=Hi.+Are+you+there?',
    'aim_alttext'            => 'AIM:&nbsp;',
    'icq_link'               => '&nbsp;',
    'icq_alttext'            => 'ICQ #:&nbsp;',
    'msn_link'               => '&nbsp;<a href="javascript:MsgrApp.LaunchIMUI(',
    'msn_linkend'            => ')">',
    'msn_alttext'            => 'Messenger:&nbsp;',
    'yim_link'               => '&nbsp;<a href="ymsgr:sendIM?',
    'yim_linkend'            => '">',
    'yim_alttext'            => 'YIM:&nbsp;',
);


/* Admin Navbar */
$LANG_GF06 = array (
    1   => 'Estadísticas',
    2   => 'Preferencias',
    3   => 'Foros',
    4   => 'Moderador',
    5   => 'Convertir',
    6   => 'Mensajes',
    7   => 'Gestión IP'
);


/* User Functions Navbar */
$LANG_GF07 = array (
    1   => 'Ver foros',
    2   => 'Preferencias',
    3   => 'Tópicos populares',
    4   => 'Subscripciones',
    5   => 'Miembros'
);


/* Forum User Features */
$LANG_GF08 = array (
    1   => 'Notificaciones de tópico',
    2   => 'Seguir notificaciones de foro',
    3   => 'Notificaciones de excepción de tópico'
);

/* Text for the buttons */
$LANG_GF09 = array (
    'edit'     => 'Edit',
    'email'    => 'Email',
    'home'     => 'Home',
    'lastpost' => 'Last Post',
    'pm'       => 'PM', // private message
    'profile'  => 'Profile',
    'quote'    => 'Quote',
    'website'  => 'Website',
    'newtopic' => 'New Topic',
    'replytopic' => 'Post Reply'
);

$LANG_GF91 = array (
    'gfstats'            => 'Estadísticas de discusión del foro',
    'statsmsg'           => 'Éstas son las estadísticas actuales de tu foro:',
    'totalcats'          => 'Total de categorías:',
    'totalforums'        => 'Total de foros:',
    'totaltopics'        => 'Total de tópicos:',
    'totalposts'         => 'Total de mensajes:',
    'totalviews'         => 'Total de visitas:',
    'avgpmsg'            => 'Media de mensajes por:',
    'category'           => 'Categoría:',
    'forum'              => 'Foro:',
    'topic'              => 'Tópico:',
    'avgvmsg'            => 'Media de visitas por:'
);

$LANG_GF92 = array (
    'gfsettings'         => 'Preferencias foro de discusión',
    'showiframe'         => 'Mostrar revisión de tópico',
    'showiframedscp'     => 'Mostrar revisión de tópico (Iframe) abajo al replicar a un tópico',
    'topicspp'           => 'Tópicos por página',
    'topicsppdscp'       => 'Número de tópicos a mostrar cuando se vé el índice del foro',
    'postspp'            => 'Mensajes por página',
    'postsppdscp'        => 'Número de mensajes a mostrar en cada página',
    'setsavemsg'         => 'Preferencias guardadas.',
);

// Board Admin
$LANG_GF93 = array (
    'gfboard'            => 'Panel de administración de foros de discusión',
    'addcat'             => 'Añadir categoría de foros',
    'addforum'           => 'Añadir un foro',
    'catorder'           => 'Orden de categorías',
     'catadded'           => 'Categoría añadida.',
    'catdeleted'         => 'Categoría borrada',
    'catedited'          => 'Category cambiada.',
    'forumadded'         => 'Foro añadido.',
    'forumaddError'      => 'Error añadiendo foro.',
    'forumdeleted'       => 'Foro borrado',
    'forumedited'        => 'Foro cambiado',
    'forumordered'       => 'Orden de foros cambiado',
    'back'               => 'Atrás',
    'addnote'            => 'Nota: Puedes cambiar estos valores.',
    'editforumnote'      => 'Cambiar detalles del foro para: <b>"%s"</b>',
    'deleteforumnote1'   => '¿Quieres borrar el foro <b>"%s"</b>&nbsp;?',
    'editcatnote'        => 'Cambiar detalles de categoría para: <b>"%s"</b>',
    'deletecatnote1'     => '¿Quieres borrar la categoría <b>"%s"</b>&nbsp;?',
    'deletecatnote2'     => 'Se borrarán también todos los foros y sus tópicos.',
    'undercat'           => 'Bajo la categoría',
    'deleteforumnote2'   => 'Se borrarán también todos los tópicos contenidos.',
    'groupaccess'        => 'Acceso de grupo: ',
    'action'             => 'Acciones',
    'forumdescription'   => 'Descripción del foro',
    'posts'              => 'Mensajes',
    'ordertitle'         => 'Orden',
    'ModEdit'            => 'Cambiar',
    'ModMove'            => 'Mover',
    'ModStick'           => 'Fijar',
    'ModBan'             => 'Expulsar',
    'addmoderator'       => "Añadir entrada",
    'delmoderator'       => " Borrar\nElegido",
    'moderatorwarning'   => '<b>Aviso: No se han definido foros</b><br' . XHTML . '><br' . XHTML . '>Define las categorías de foros y añade al menos un foro<br' . XHTML . '>antes de intentar añadir moderadores',
    'private'            => 'Foro privado',
    'filtertitle'        => 'Elegir moderadores a ver',
    'addmessage'         => 'Añadir nuevo moderador',
    'allowedfunctions'   => 'Funciones permitidas',
    'userrecords'        => 'Entradas de usuarios',
    'grouprecords'       => 'Entradas de grupos',
    'filterview'         => 'Filtrar vista',
    'readonly'           => 'Foro de solo lectura',
    'readonlydscp'       => 'Solo el moderador puede enviar mensajes a este foro',
    'hidden'             => 'Foro oculto',
    'hiddendscp'         => 'El foro no aparece en el índice',
    'hideposts'          => 'Ocultar mensajjes nuevos',
    'hidepostsdscp'      => 'Las actualizaciones no aparecerán en el bloque de mensajes nuevos o alimentaciones RSS',
    'mod_title'          => 'Moderadores de foro',
    'allforums'          => 'Todos los foros'
);

$LANG_GF95 = array (
    'header1'           => 'Mensajes de discusión',
    'header2'           => 'Mensajes de discusión para el foro &nbsp;&raquo;&nbsp;%s',
    'notyet'            => 'Característica no implementada todavía',
    'delall'            => 'Borrar todo',
    'delallmsg'         => '¿Seguro que quieres borrar todos los mensajes de: %s?',
    'underforum'        => '<b>En el foro: %s (ID #%s)',
    'moderate'          => 'Moderar',
    'nomess'            => '¡Aún no se han enviado mensajes! '
);

$LANG_GF96 = array (
    'ip'                 => 'IP',
    'enterip'            => 'Enter below an IP address to ban',
    'gfipman'            => 'Gestión IP',
    'ban'                => 'Expulsar',
    'noips'              => '<p style="margin:0px; padding:5px;">¡Aún no se ha expulsado ninguna IP!</p>',
    'unban'              => 'Perdonar',
    'ipbanned'           => 'Dirección IP expulsada',
    'banip'              => 'Confirmación de expulsión IP',
    'banipmsg'           => '¿Seguro que deseas expulsar la IP %s?',
    'specip'             => 'Por favor, especifica una dirección IP a expulsar!',
    'ipunbanned'         => 'Dirección IP perdonada.',
    'noip'               => 'You did not provide an IP address!'
);

// Localization of the Admin Configuration UI
$LANG_configsections['forum'] = array(
    'label' => 'Forum',
    'title' => 'Forum Configuration'
);

$LANG_confignames['forum'] = array(
    'registration_required' => 'Login Required to View Posts?',
    'registered_to_post'    => 'Login Required to Post?',
    'allow_notification'    => 'Allow Notification?',
    'show_topicreview'      => 'Show Topic Review when Replying?',
    'allow_user_dateformat' => 'Allow User defined Date Format?',
    'use_pm_plugin'         => 'Use Private Message Plugin?',
    'show_topics_perpage'   => 'Number of Topics to Show per Page',
    'show_posts_perpage'    => 'Number of Posts to Show per Page',
    'show_messages_perpage' => 'Number of Message Lines per Page',
    'show_searches_perpage' => 'Number of Search Results per Page',
    'showblocks'            => 'Block Columns to Show with Forum',
    'usermenu'              => 'Type of User Menu',
    'use_themes_template'   => 'Use templates in the theme directory',
    // ----------------------------------
    'show_subject_length'   => 'Max Length of Subject',
    'min_username_length'   => 'Min Length of Username',
    'min_subject_length'    => 'Min Length of Subject',
    'min_comment_length'    => 'Min Length of Post Content',
    'views_tobe_popular'    => 'Number of Views to have Popular',
    'post_speedlimit'       => 'Posting Speedlimit(sec)',
    'allowed_editwindow'    => 'Timeframe(sec) to Allow Edit Posts',
    'allow_html'            => 'Allow HTML Mode?',
    'post_htmlmode'         => 'Set HTML Mode as Default?',
    'convert_break'         => 'Convert Newlines to HTML &lt;BR&gt;?',
    'use_censor'            => 'Use Geeklog Censoring?',
    'use_glfilter'          => 'Use Geeklog Filtering?',
    'use_geshi'             => 'Use Geshi Code Formatting?',
    'use_spamx_filter'      => 'Use Spam-X Plugin?',
    'show_moods'            => 'Enable Moods?',
    'allow_smilies'         => 'Enable Smilies?',
    'use_smilies_plugin'    => 'Use Smilies Plugin?',
    'avatar_width'          => 'Width of Member Avatar',
    // ----------------------------------
    'show_centerblock'      => 'Enable Centerblock?',
    'centerblock_homepage'  => 'Enable Homepage Only?',
    'centerblock_numposts'  => 'Number of Posts to Show',
    'cb_subject_size'       => 'Max Length of Subject',
    'centerblock_where'     => 'Placement on Page',
    // ----------------------------------
    'sideblock_numposts'    => 'Number of Posts to Show',
    'sb_subject_size'       => 'Max Length of Subject',
    'sb_latestpostonly'     => 'Show Latest Post Only?',
    // ----------------------------------
    'level1'                => 'Number of Posts of Level1',
    'level2'                => 'Number of Posts of Level2',
    'level3'                => 'Number of Posts of Level3',
    'level4'                => 'Number of Posts of Level4',
    'level5'                => 'Number of Posts of Level5',
    'level1name'            => 'Name of Level1',
    'level2name'            => 'Name of Level2',
    'level3name'            => 'Name of Level3',
    'level4name'            => 'Name of Level4',
    'level5name'            => 'Name of Level5'
);

$LANG_configsubgroups['forum'] = array(
    'sg_main' => 'Main Settings'
);

$LANG_tab['forum'] = array(
    'tab_main'         => 'General Forum Settings',
    'tab_topicposting' => 'Topic Posting',
    'tab_centerblock'  => 'Centerblock',
    'tab_sideblock'    => 'Sideblock',
    'tab_rank'         => 'Rank'
);

$LANG_fs['forum'] = array(
    'fs_main'         => 'General Forum Settings',
    'fs_topicposting' => 'Topic Posting',
    'fs_centerblock'  => 'Centerblock',
    'fs_sideblock'    => 'Sideblock',
    'fs_rank'         => 'Rank'
);

// Note: entries 0, 1, and 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['forum'] = array(
    0 => array('True' => 1, 'False' => 0),
    1 => array('True' => TRUE, 'False' => FALSE),
    5 => array('Top Of Page' => 1, 'After Featured Story' => 2, 'Bottom Of Page' => 3),
    6 => array('Left Blocks' => 'leftblocks', 'Right Blocks' => 'rightblocks', 'All Blocks' => 'allblocks', 'No Blocks' => 'noblocks'),
    7 => array('Block Menu' => 'blockmenu', 'Navigation Bar' => 'navbar', 'None' => 'none'),
    12 => array('No access' => 0, 'Read-Only' => 2, 'Read-Write' => 3),
);
?>
