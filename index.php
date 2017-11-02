<html>
    
    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="/js/app.js"></script>
    </head>
    
    
    <body>
        
        <button type="button" class="app-refresh-button">Обновить</button>
        <div style="display: none" class="app-loading-block">Загрузка...</div>
        <div class="app-container"></div>
        
        <script>
            $(document).ready(function() {
                app.init();
            });
        </script>
    </body>
</html>