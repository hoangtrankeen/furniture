(function() {
    var client = algoliasearch('J3V81Z7V0M', '891f61a6e758185a9b89b64901f44d3a');
    var index = client.initIndex('products');
    var enterPressed = false;
    //initialize autocomplete on search input (ID selector must match)
    autocomplete('#aa-search-input',
        { hint: false }, {
            source: autocomplete.sources.hits(index, { hitsPerPage: 10 }),
            //value to be displayed in input control after user's suggestion selection
            displayKey: 'name',
            //hash of templates used when rendering dataset
            templates: {
                //'suggestion' templating function used to render a single suggestion
                suggestion: function (suggestion) {
                    const markup = `
                        <div class="algolia-result row">
                            <div class="col-sm-3">
                                <img src="${window.location.origin}/manage_images/${suggestion.image}" alt="img" class="algolia-thumb">
                            </div>
                            <div class="col-sm-5">
                                ${suggestion._highlightResult.name.value}
                            </div>
                           
                            <div class=" col-sm-4 result-price">$${(suggestion.price)}</div>
                        </div>
                        
                    `;

                    return markup;
                },
                empty: function (result) {
                    return 'Không có kết quả nào cho "' + result.query + '"';
                }
            }
        }).on('autocomplete:selected', function (event, suggestion, dataset) {
            window.location.href = window.location.origin + '/shop/' + suggestion.slug;
            enterPressed = true;
        }).on('keyup', function(event) {
            if (event.keyCode == 13 && !enterPressed) {
                window.location.href = window.location.origin + '/search-algolia?q=' + document.getElementById('aa-search-input').value;
            }
        });
})();
