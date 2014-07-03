Silverstripe-Widgets
===========================

Alternative Widgets Module.

This module was inspired by a number of other guides and modules that are out their that will provide widget type
functionality.

While its not a pretty or fully featured as the silverstripe/widgts module it allows you to use ANY type of form element
as part of the widget which is not currently possible with the silverstripe widgets module (try using an UploadField in a widget)

*N.B.* Please note that this module does not currently handle requests for forms used in widgets. However this is a
feature we hope to add in the future

Configuration
-------------

This module is Extension based and as such you will need to configure it to work with your silverstripe site.

In order to do this you can register the extension against your selected page by adding something like the following
to your yaml config

```yaml
Page:
  extensions:
    - WidgetPageExtension
```

This will attach a Single Relationship to Widgets. This essentially acts as a SideBar/WidgetArea and will automatically
update the pages CMS fields.

If you wish to have more than one Widget area on a page you can do this by just manually defining a new `$many_many`
relationship to Widget and adding the appropriate fields to your pages getCMSFields() method. For inspiration take a
look at the code/WidgetPageExtension.php file

Creating Widgets
----------------

While we anticipate providing some default widgets in the future that can be used with this module it is super simple
to actually create a new widget. Below are the bare minimum instructions to create a widget

1. Create yourself a folder for your widget
2. Create an empty _config.php in your new folder
3. Create a {WidgetName}.php file in your folder that contains the class
```php
class {WidgetName} extends Widget {}
```
4. Create a {WidgetName}.ss file in your folder with the required template you need for your widget

In your new php class you can define the fields and a getCMSFields() method in the same way you would any other
DataObject

Rendering
---------

Each Widget relies on having a .ss file which is used in conjunction with a Widget::forTemplate() method.

There is also helper method that you can use in your template of $GetWidgets which will return your Widgets according
to the sort order defined by your GridField.

The easiest way to render your widgets is to do the following

```html
<% loop $GetWidgets() %>
    {$forTemplate}
<% end_loop %>
```












