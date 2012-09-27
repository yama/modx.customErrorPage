/**
 * customErrorPage
 *
 * <strong>1.0</strong> ドキュメント毎にエラーページをカスタマイズします
 * @internal @events OnPageNotFound
 * @internal @properties &ids=<strong>特定のドキュメントに設定する場合</strong><hr>対象にするドキュメントのID;text; &error_id=エラーページにするドキュメントのID<br>※非公開またはウェブユーザ限定のリソースは指定できません。;text; &tvname=<strong>ドキュメント毎に設定する場合</strong><hr>設定に使用するテンプレート変数の名前;text;
 */

$e = &$modx->Event;
switch($e->name) {
  case "OnPageNotFound":
    if ($tvname && $modx->documentObject[$tvname][1]) {
      if ($modx->getDocument($modx->documentObject[$tvname][1],'id')) {
        $modx->config['error_page'] = $modx->documentObject[$tvname][1];
      }
    } else if ($ids && $error_id && in_array($modx->documentIdentifier, explode(',',$ids))) {
      $modx->config['error_page'] = $error_id;
    }
  break;
}