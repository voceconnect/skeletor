(function($){

    $.fn.menuCollapse = function() {
        
        m = {
            init : function() { 
                $('ul.menu li').each(function(){
                    thisDepth = m.getDepth($(this));
                    nextDepth = m.getDepth($(this).next('li'));
                    if(nextDepth > thisDepth){
                        m.addButton($(this));
                    }
                })
           
            },
            getDepth : function(el) {
                if(el.attr('class') != undefined){
                    theClass = el.attr('class').split(/\s/)[1];
                    return theClass.charAt(theClass.length-1);
                } else {
                    return false;
                }
            },
            addButton : function(el) { 
                el.append('<a class="toggler">+</a>');
            },
            getChildren : function(el) { 
                parentLI = el.parent('li');
                parentDepth = m.getDepth(parentLI);
                $children = $();
                siblings = parentLI.nextAll('li');
                siblings.each(function(){
                    if(parentDepth < m.getDepth($(this))){
                        $children = $children.add($(this));
                    } else {
                        return false;
                    }
                })
                return $children;
            }
        };

        m.init();
        $('a.toggler').toggle(function(){
            m.getChildren($(this)).slideUp();
        }, function(){
            m.getChildren($(this)).slideDown();
        })
        
    };

})(jQuery);


jQuery(document).ready(function($){
    $().menuCollapse(); 
})