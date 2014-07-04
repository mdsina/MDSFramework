<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Поиск</title>
    <link rel="stylesheet" type="text/css" href="/static/css/styles.css" />
</head>
<body>
    <div id="page">
        <form id="searchForm" action="/search/" method="get">
            <h1>Поиск</h1>
            <fieldset>
                <input id="s" type="text" value="<?php echo $renderData['extended']['query']; ?>" name="query" />
                <input type="submit" value="Submit" id="submitButton" />
                <div id="searchInContainer">
                    <input type="radio" name="api" value="google" id="searchSite" checked />
                    <label for="searchSite" id="siteNameLabel">Поиск в Google</label>
                    <input type="radio" name="api" value="yandex" id="searchWeb" />
                    <label for="searchWeb">Поиск в Yandex</label>
                </div>
            </fieldset>
        </form>

        <div id="resultsDiv">
            <div style="display: block;" class="pageContainer">
                <?php
                    if (!empty($renderData['data'])) {
                        foreach ($renderData['data'] as $item) {

                ?>
                <div class="webResult">
                    <h2>
                        <a href="<?php echo $item['url']; ?>" target="_blank">
                            <?php echo $item['title']; ?>
                        </a>
                    </h2>
                    <p>
                        <?php echo $item['content']; ?>
                    </p>
                </div>
                <?php
                    }
                }
                ?>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</body>
</html>