#jQuery Search Plugin

This plugin is utilize to search selected elements and filter them.

##Usage
    
    <input type="text" id="search" />
    
    <p data-search-data="text 1" class="search-in">text 1</p>
    <p data-search-data="text 2" class="search-in">text 2</p>
    
    <script>
      $('.search-in').jqSearch();
    </script>
    
###Customize

    <input type="text" id="search-2" />
    
    <p data-search-text="text 1" class="search-in">text 1</p>
    <p data-search-text="text 2" class="search-in">text 2</p>
    
    <script>
      $('.search-in').jqSearch({
        searchInput   : '#search-2',
        searchTarget  : 'data',
        searchData    : 'search-text',
        animation     : 'slide'
      });
    </script>
    
Or you can also search in text:

    <input type="text" id="search-2" />
    
    <p class="search-in">text 1</p>
    <p class="search-in">text 2</p>
    
    <script>
      $('.search-in').jqSearch({
        searchInput   : '#search-2',
        searchTarget  : 'text',
        animation     : 'fade'
      });
    </script>
    
##Options

|Option Name|Default Value|Choices|Explanation|
|---|---|---|---|
|searchInput|*#search*|Any jQuery Selector|Any jQuery selector to input. Note that: it must be a form element! **Ex:** 'input[type=text]#srch'|
|searchTarget|*data*|`data` or `text`|If you choose `text` it will search in text content of the selected elements. *( $(this).text() )* if you choose `data` it will search in predefined *data* section of the selected elements. `( $(this).data('search-data') )`|
|searchData|*search-data*|any text for $.data()|If you choose `data` as *searchTarget* you can define which data element it will search. `( $(this).data(searchData) )`|
|animation|*fade*|`fade` or `slide`|You can choose hide and show animation with this option. There is just two animation type.|

[![Hits](https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=https%3A%2F%2Fgithub.com%2FWebFikirleri%2FjqSearch&count_bg=%233D8FC8&title_bg=%23555555&icon=microsoftacademic.svg&icon_color=%23E7E7E7&title=VISITS&edge_flat=true)](https://hits.seeyoufarm.com)
