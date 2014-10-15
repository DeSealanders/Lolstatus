<?php
require('php/config/conf.default.php');
?>
<!DOCTYPE html>
<html>
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <script src="js/documentready.js"></script>
</head>
<body>
<?php
if(isset($_GET['action'])) {
    if($_GET['action'] == 'update') {
        $import = ImportManager::getInstance()->getImport();
        $updates = UpdateManager::getInstance()->getUpdates($import);
        $messages = MessageManager::getInstance()->createMessages($updates);
        MessageManager::getInstance()->post($messages);
        $errors = Logger::getInstance()->getLog();
        echo $errors;
    }
}
else {
    header('Location: feed.php');
}
?>
</body>
</html>