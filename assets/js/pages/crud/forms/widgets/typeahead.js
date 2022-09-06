// Class definition
var KTTypeahead = function() {

    var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
            'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
            'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
            'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
            'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
            'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
            'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
            'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
            'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
        ];

    // Private functions
    var demo1 = function() {
        var substringMatcher = function(strs) {
            return function findMatches(q, cb) {
                var matches, substringRegex;

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, function(i, str) {
                    if (substrRegex.test(str)) {
                        matches.push(str);
                    }
                });

                cb(matches);
            };
        };

        $('#kt_typeahead_1, #kt_typeahead_1_modal, #kt_typeahead_1_validate, #kt_typeahead_2_validate, #kt_typeahead_3_validate').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'states',
            source: substringMatcher(states)
        });
    }

    var demo2 = function() {
        // constructs the suggestion engine
        var bloodhound = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            // `states` is an array of state names defined in "The Basics"
            local: states
        });

        $('#kt_typeahead_2, #kt_typeahead_2_modal').typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        },
        {
            name: 'states',
            source: bloodhound
        });
    }

    var demo3 = function() {
        var countries = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            // url points to a json file that contains an array of country names, see
            // https://github.com/twitter/typeahead.js/blob/gh-pages/data/countries.json
            prefetch: 'https://keenthemes.com/metronic/tools/preview/api/typeahead/countries.json'
        });

        // passing in `null` for the `options` arguments will result in the default
        // options being used
        $('#kt_typeahead_3, #kt_typeahead_3_modal').typeahead(null, {
            name: 'countries',
            source: countries
        });
    }

    var demo4 = function() {
        var bestPictures = new Bloodhound({
          datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
          queryTokenizer: Bloodhound.tokenizers.whitespace,
         // prefetch: '/aajax/search_library',
            remote: {
                url: '/aajax/search_library/%QUERY',
                wildcard: '%QUERY',
            }
        });

        $('#kt_typeahead_4').typeahead(null, {
            name: 'best-pictures',
            display: 'value',
            source: bestPictures,
            templates: {
                empty: [
                    '<div class="empty-message" style="padding: 10px 15px; text-align: center;">',
                        'unable to find any Best Picture winners that match the current query',
                    '</div>'
                ].join('\n'),
                suggestion: Handlebars.compile('<div class="kt-user-card-v2"><div class="kt-user-card-v2__pic2" style="width: 120px"><img height="50" src="{{img}}" style="border-radius: 4px;"/></div><div class="kt-user-card-v2__details"><a class="kt-user-card-v2__name text-center" href="#">{{value}}</a><span class="kt-user-card-v2__desc">CEO</span></div></div>')
            },

        });
    };



    //'<div><strong>{{value}}</strong> – {{year}}</div>'
    //<span style="width: 200px;"><div class="kt-user-card-v2">							<div class="kt-user-card-v2__pic">								<div class="kt-badge kt-badge--xl kt-badge--success">N</div>							</div>							<div class="kt-user-card-v2__details">								<a class="kt-user-card-v2__name" href="#">Nixie Sailor</a>								<span class="kt-user-card-v2__desc">CEO</span>							</div>						</div></span>


    var demo5 = function() {
        var nbaTeams = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('team'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: 'https://keenthemes.com/metronic/tools/preview/api/typeahead/nba.json'
        });

        var nhlTeams = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.obj.whitespace('team'),
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            prefetch: 'https://keenthemes.com/metronic/tools/preview/api/typeahead/nhl.json'
        });

        $('#kt_typeahead_5').typeahead({
                highlight: true
            },{
                name: 'nba-teams',
                display: 'team',
                source: nbaTeams,
                templates: {
                    header: '<h3 class="league-name" style="padding: 5px 15px; font-size: 1.2rem; margin:0;">NBA Teams</h3>'
                }
            },{
                name: 'nhl-teams',
                display: 'team',
                source: nhlTeams,
                templates: {
                    header: '<h3 class="league-name" style="padding: 5px 15px; font-size: 1.2rem; margin:0;">NHL Teams</h3>'
                }
            }
        );
    }

    return {
        // public functions
        init: function() {
            // demo1();
            // demo2();
            // demo3();
            demo4();
            // demo5();
        }
    };
}();

jQuery(document).ready(function() {
    KTTypeahead.init();
});
