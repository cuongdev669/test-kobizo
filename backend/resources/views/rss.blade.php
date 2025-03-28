<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple RSS Reader</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        .rss-container {
            max-width: 800px;
            margin: auto;
        }
        .rss-item {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
        }
        .rss-item:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
<h2>Simple RSS Reader</h2>
@if($result)
    <div class="rss-container" id="rssFeed">
        @foreach($result->channel->item as $item)
        <div class="rss-item" onclick="confirmPrint('{{ $item->title }}', '{{ $item->link }}')">
            <h3>{{ $item->title }}</h3>
            <a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a>
        </div>
        @endforeach
    </div>
@else
<p style="color:red;">{{ $result["error"] }}</p>
@endif
<script>
    function confirmPrint(title, link) {
        if (confirm("Print this post?")) {
            fetch(`{{ route("rss-print") }}?url=${encodeURIComponent(link)}`)
                .then(response => response.text())
                .then(html => {
                    const printWindow = window.open("", "_blank");
                    if (printWindow) {
                        printWindow.document.write(html);
                        printWindow.document.close();
                        printWindow.onload = function () {
                            printWindow.print();
                        };
                    }
                })
                .catch(error => {
                    alert("Can not load post: " + error);
                });
        }
    }
</script>

</body>
</html>
