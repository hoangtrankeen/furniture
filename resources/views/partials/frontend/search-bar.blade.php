<div class="search-container header-customize-item">
    <span>
        <form id="content" action="{{route('catalog.search')}}" method="get">
            <input type="text" name="q" id="search-field" class="input"/>
            <button type="reset" class="search"></button>
            {{csrf_field()}}
        </form>
        <!--<div class="search-result">
            <ul class="result-list">
                <li class="item">
                    <div class="item-image"><img src="" alt=""></div>
                    <div class="item-name"><span>Something</span></div>
                    <div class="item-price"><span>255</span></div>
                </li>
            </ul>
        </div>-->
    </span>

</div>