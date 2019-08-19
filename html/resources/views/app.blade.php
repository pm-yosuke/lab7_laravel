<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="metro4:init" content="false">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LaravelSPA</title>
    <!-- Metro 4 -->
    <link rel="stylesheet" href="https://cdn.metroui.org.ua/v4/css/metro-all.min.css">

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">
    <App></App>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.metroui.org.ua/v4/js/metro.min.js"></script>
<script>
    Metro.locales['ja-JP'] = {
        "calendar": {
            "months": [
                "1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月",
                "1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"
            ],
            "days": [
                "日曜日", "月曜日", "火曜日", "水曜日", "木曜日", "金曜日", "土曜日",
                "日", "月", "火", "水", "木", "金", "土",
                "日曜", "月曜", "火曜", "水曜", "木曜", "金曜", "土曜"
            ],
            "time": {
                "days": "曜日",
                "hours": "時",
                "minutes": "分",
                "seconds": "秒",
                "month": "月",
                "day": "日",
                "year": "年"
            }
        },
        "buttons": {
            "ok": "OK",
            "cancel": "キャンセル",
            "done": "完了",
            "today": "今日",
            "now": "現在",
            "clear": "クリア",
            "help": "ヘルプ",
            "yes": "はい",
            "no": "いいえ",
            "random": "ランダム",
            "save": "保存",
            "reset": "リセット"
        }
    };
</script>
<script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
