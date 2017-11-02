var app = (function () {
    /**
     * Приватные методы
     */ 
    var initEvents = function() {
        $('.app-refresh-button').off('click').on('click', onRefreshClick)
    },
    
    /**
     * Клик по рефрешу
     */ 
    onRefreshClick = function(e) {
        event.preventDefault();
        event.stopPropagation();
        var $element    = $(e.target);
        
        $('.active').removeClass('active');
        $element.parents('li').addClass('active');
        $('.app-container').html('');
        
        $.ajax('/api.php', {
            type: 'get',
            data: {},
            beforeSend: showLoading,
            success: onGetResourceSuccess,
            complete: hideLoading,
        });
    }, 
    
    /**
     * Рефреш завершен
     */ 
    onGetResourceSuccess = function(response) {
        $('.app-container').html(response);
    },
    
    /**
     * Показать лоадер
     */ 
    showLoading = function() {
        $('.app-loading-block').show();
    },
    
    /**
     * Спрятать лоадер
     */ 
    hideLoading = function() {
        $('.app-loading-block').hide();
    };
 
    return {
        /**
         * Публичные методы
         */ 
        init: function() {
            initEvents();
        }
    }
})();