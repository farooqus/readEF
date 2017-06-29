EventFinda API - Event list
========================
Get event list with name , session dates and ticket types

### Setup ###
1. Clone/Download
1. Run composer install

### Configuration ###
1. Sign Up for API [EventFinda API](https://www.eventfinda.co.nz/api/v2/index)
1. Add following parameters to parameters.yml

```
    api_username: USERNAME
    api_password: PASSWORD
    api_endpoint: http://api.eventfinda.co.nz/v2/events.json?fields=event:(name,sessions,ticket_types)
```

 [Documentation](https://www.eventfinda.co.nz/api/v2/end-points) can be referred for more query parameters and response formats.