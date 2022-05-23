<style>
    .nav-tabs {
        border: none;
    }

    .nav-tabs .nav-item {
        /* font-family: 'Helvetica'; */
        font-size: 1.2em;
        flex: 1 1 0;
    }

    .nav-tabs .nav-item::before {
        position: absolute;
        z-index: -1;
        content: "";
        right: -10%;
        top: 0;
        height: 100%;
        width: 100%;
        background-color: inherit;
        -webkit-transform: skewX(-10deg);
        -moz-transform: skewX(-10deg);
        -ms-transform: skewX(-10deg);
        transform: skewX(-10deg);
    }

    .nav-tabs .nav-item .nav-link {
        border: none;
        border-radius: 4px;
        padding: 20px 30px;
        color: var(--main-theme-color);
        background-color: #f2f7fb;
        margin-right: 5px;
        text-align: center;
    }

    .nav-tabs .nav-item:last-of-type .nav-link {
        margin-right: 0;
    }

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-item .nav-link:hover,
    .nav-tabs .nav-link.active {
        color: #d7e6ff;
        background-color: var(--main-theme-color);
    }

    .tab-content {
        padding-top: 15px;
    }

</style>
<ul class="nav nav-tabs justify-content-between font-noto" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">मुख्य</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">चिठी तथा प्रमाणपत्र</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active py-3" id="home" role="tabpanel" aria-labelledby="home-tab">
        @include('partials.org-action-bar')
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        @include('partials.org-letter-docs')
    </div>
</div>
