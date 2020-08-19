/*
* Check how advanced customization works here
* https://wpmanageninja.com/docs/fluent-form/field-types/time-date/#advanced_configaration
* You can use the following snippets in the "Advanced Date Configuration" box of your date element settings
* - You can use these settings as combined to
* - you can use any flatpickr options - https://flatpickr.js.org/examples/
 */

/*
* Allow only future dates
 */

{
    minDate: "today"
}

/*
* Allow only from today and 14 days from now
 */
{
    minDate: "today",
    maxDate: new Date().fp_incr(14) // 14 days from now
}

/*
* Disabling range(s) of dates:
 */
{
    dateFormat: "Y-m-d",
    disable: [
        {
            from: "2020-08-01",
            to: "2020-08-01"
        },
        {
            from: "2020-09-01",
            to: "2020-10-01"
        }
    ]
}