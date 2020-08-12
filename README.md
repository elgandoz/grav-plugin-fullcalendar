# Fullcalendar Plugin

The **Fullcalendar** Plugin is for [Grav CMS](http://github.com/getgrav/grav). It reads an ICS Calendar File and shows Events in a monthly Calendar Widget on your Page(s)

## Installation

### Manual Installation

To install this plugin, just download the zip version of this repository and unzip it under `/your/site/grav/user/plugins`. Then, rename the folder to `fullcalendar`. You can find these files on [GitHub](https://github.com/sherpadawan/grav-plugin-fullcalendar) or via [GetGrav.org](http://getgrav.org/downloads/plugins#extras).

You should now have all the plugin files under

    /your/site/grav/user/plugins/fullcalendar
    
> NOTE: This plugin is a modular component for Grav which requires [Grav](http://github.com/getgrav/grav) and the [Error](https://github.com/getgrav/grav-plugin-error) and [Problems](https://github.com/getgrav/grav-plugin-problems) to operate.

### Admin Plugin

If you use the admin plugin, you can install directly through the admin plugin by browsing the `Plugins` tab and clicking on the `Add` button.

## Configuration

Before configuring this plugin, you should copy the `user/plugins/fullcalendar/fullcalendar.yaml` to `user/config/plugins/fullcalendar.yaml` and only edit that copy.

Here is the default configuration and an explanation of available options:

```yaml

enabled: true
showlegend: false   # set to true to show calendar File Name(s) as Legend below grid
locale: en  # use your own locale here, e.g. de
timezone: 'local' #one can set it to any timezone string
proxy : 'https://cors-anywhere.herokuapp.com/'
fullcalendar:
  weekNumbers: false  # set to true to show Week Numbers

calendars:
 - 
  name: 'Personnal'
  ics: 'personnal.ics'
  color: blue
 -
  name: 'Work'
  ics: 'work.ics'
  color: red
 - 
  name: 'Holidays'
  ics: 'https://cloud.mydomain.com/calendar/holidays?export'
  color: green
```

Note that if you use the admin plugin, a file with your configuration, and named fullcalendar.yaml will be saved in the `user/config/plugins/` folder once the configuration is saved in the admin.

## Usage

Once installed and enabled, you can use this Plugin to parse an ICS Calendar File (must be found in user/data/calendars and set as  parameter in Plugin shortcode, without Path !) and display Events from that Calendar anywhere on your Site using this shortcode:

    [fullcalendar icsfile=example.ics][/fullcalendar]
    
in the appropriate page.
As an addition, you can show a Picture for the current month above the calendar widget.
Just put 12 Image Files named 'January.jpg', 'February.jpg', ... , 'December.jpg' in the Folder for your Page where the Calendar will be placed.

### additional note on repeating Events (from v 0.2.0):
Repeating Events are now basically supported by incorporating the rrule Plugin from fullcalendar.io V 4.3.1.
There are, however, some rrule Options left, that are not yet supported - should work for most common rrules, though.
Additionaly, a new configuration Option has been introduced: locale - just set this to your Preferred value in fullcalendar.yaml.
Default is en.
Also note that file assets/custom.css has been renamed to daygrid.css - custom.css is for user adaptions and will also be used, if present (but is not provided with plugin) !

## Credits

This Plugin is built on [fullcalendar.io](https://fullcalendar.io), [jakubroztocil/rrule](https://github.com/jakubroztocil/rrule) and [jsical](http://mozilla-comm.github.io/ical.js) - Javascript parser for rfc5545

## To Do
http ics files caching

