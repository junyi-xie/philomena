<?php print("<!--".date("YmdHis")."-->"); $jsFiles = getFiles("assets\js", "js"); echo loadFiles($jsFiles); ?>
    
</body>
</html>