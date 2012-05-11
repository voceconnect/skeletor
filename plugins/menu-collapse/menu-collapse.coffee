# TODO : make addition of togglers a Live event

$ = jQuery
$.fn.menuCollapse = (o)->
  d = 
    menuList      : 'ul.menu li'
    togglerClass  : 'toggler'
    closedSymbol  : '+'
    openSymbol    : '-'

  d = $.extend d, o
  
  m =
    init: () ->
      $("#{d.menuList}").each (index, element) =>
        if m.getDepth($(element).next 'li' ) > m.getDepth $(element)
          m.addToggler $(element) # add buttons to all LI elements that have children
      m.attachHandler()
      $("a.#{d.togglerClass}").click() # close all of the children

    # WP only stores the depth of the LI at the end of a CSS class. Extracting it.
    getDepth: (el) ->
      theClass = el.attr('class')
      if typeof theClass isnt 'undefined' and theClass?
        theClass = theClass.split(/\s/)[1]
        theClass.charAt theClass.length-1
    
    # append the toggler element to the LI element
    addToggler : (el, status = 'open') -> 
      symbol = d.openSymbol 
      if status is 'close' 
        symbol = d.closedSymbol
      el.append "<a class='#{d.togglerClass}' rel='#{status}'>#{symbol}</a>"

    # returns the child-menu items.
    getChildren : (el, allChildren = false) ->
      parentLI    = el.parent 'li'
      parentDepth = m.getDepth parentLI
      $children   = $() # storing children in a jQuery object
      siblings    = parentLI.nextAll 'li'
      siblings.each (index, element) =>
        if parentDepth < m.getDepth $(element)
          if allChildren is true
            if parentDepth < m.getDepth $(element) # get all children
              $children = $children.add $(element )
          else
            if (parentDepth - m.getDepth $(element)) == -1 # exclude grand-children
              $children = $children.add $(element )
        else 
          return false
      $children
     
    # return the state (open/closed) for the toggler
    getState : (el) ->
      if typeof el isnt 'undefined' and el?
        el.attr('rel')
      else
        false
          
    # change the status and symbol of the toggler    
    switchToggler : (el) ->
      state = m.getState(el)
      if state == 'open'
        el.text "#{d.closedSymbol}"
        el.attr('rel', 'closed')
      else if state == 'closed'
        el.text "#{d.openSymbol}"
        el.attr('rel', 'open')
      else
        false

    # attach handler
    attachHandler : () ->
      $("a.#{d.togglerClass}").toggle ->
        allChildren = m.getChildren($(@), true) # close all children
        $(allChildren).slideUp()
        m.switchToggler $(@)
      , -> 
        allChildren = m.getChildren($(@))
        #allChildren.each (index, element) ->
        #  state = m.getState($(@))
        m.getChildren($(@)).slideDown()
        m.switchToggler $(@)    

  # get this party started
  m.init()


options =
  closedSymbol  : ">"
  openSymbol    : "<"

$(document).ready ->
  $().menuCollapse(options)