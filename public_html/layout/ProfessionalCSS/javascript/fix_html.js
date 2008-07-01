function FixHTML( leftblocksID, centerblocksID, rightblocksID ) {
  var ua = navigator.userAgent.toLowerCase();
  var is_ie = ua.indexOf("msie") != -1 && ua.indexOf("opera") == -1;

  var leftblocks = document.getElementById(leftblocksID);
  var centerblocks = document.getElementById(centerblocksID);
  var rightblocks = document.getElementById(rightblocksID);



  if ( document.body.getAttribute('class') || document.body.getAttribute('className') ) {
    var classValue = 'left-center-right';

    /* HTMLのid属性の値をチェックします。 */
    if ( leftblocks && centerblocks && !rightblocks ) classValue = 'left-center';
    if ( !leftblocks && centerblocks && rightblocks ) classValue = 'center-right';
    if ( !leftblocks && centerblocks && !rightblocks ) classValue = 'center';

    /* body要素のclass属性に「js_on」を設定します。 */
    classValue += ' js_on';

    /* HTMLの構造によってbody要素のclass属性に値を設定します。 */
    if ( is_ie ) {  /* IE用 */
      document.body.setAttribute('className', classValue);
    } else {  /* Gecko, Opera, Safari他用 */
      document.body.setAttribute('class', classValue);
    }

    /* テーマに依存したプラグインテンプレート等の不具合を補正します(暫定的措置)。 */
    var br = document.createElement("br");
    centerblocks.appendChild(br);
  }
}
