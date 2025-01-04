<div class="container ">
    <div class="row" style="height:60px;">
        <div class="col-12 col-md-auto d-flex justify-content-center align-items-center">
            <div class="fade-in" style="opacity: 0; transform: translateY(20px);">
                <form action="{{ route('article.search') }}" method="GET" class="d-flex justify-content-center align-items-center" role="search">
                    <div class="input-group" style="max-width: 600px; width: 100%; display: flex; align-items: center;">
                        <div class="position-relative" style="flex-grow: 1;">
                            <input
                                type="search"
                                name="query"
                                class="form-control"
                                placeholder="Cerca tra gli articoli..."
                                aria-label="Search"
                                autocorrect="off"
                                autocapitalize="off"
                                spellcheck="false"
                                style="height: 45px; font-size: 1.4rem; border-radius: 25px 0 0 25px; padding-left: 35px; border-color: black;">
                            <i class="bi bi-search position-absolute" style="left: 10px; top: 50%; transform: translateY(-50%); color: #aaa;"></i>
                        </div>
                        <button type="submit" class="btn btn-dark" style="height: 45px; font-size: 1.3rem; border-radius: 0 25px 25px 0;">Cerca</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>