$ = jQuery
$.fn.menuCollapse = ->
  d = 
    menuList : 'ul.menu li'
    togglerClass : 'toggler'

  m =
    init: () ->
      $("#{d.menuList}").each (index, element) =>
        if(m.getDepth($(element).next 'li' ) > m.getDepth $(element) )
          m.addButton $(element)

    getDepth: (el) ->
      theClass = el.attr('class')
      if typeof theClass != 'undefined' and theClass?
        theClass = theClass.split(/\s/)[1]
        theClass.charAt theClass.length-1

    addButton : (el) -> 
      el.append "<a class='#{d.togglerClass}'>-</a>"

    getChildren : (el) ->
      parentLI = el.parent 'li'
      parentDepth = m.getDepth parentLI
      $children = $()
      siblings = parentLI.nextAll 'li'
      siblings.each (index, element) =>
        if(parentDepth < m.getDepth $(element) )
          $children = $children.add $(element )
      $children;

  m.init()
  $("a.#{d.togglerClass}").toggle ->
    m.getChildren($(@)).slideUp()
    $(@).text "+"
  , -> 
    m.getChildren($(@)).slideDown()
    $(@).text "-"

  $("a.#{d.togglerClass}").click()

$(document).ready ->
  $().menuCollapse()