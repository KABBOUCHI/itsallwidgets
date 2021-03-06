<?=
/* Using an echo tag here so the `<? ... ?>` won't get parsed as short tags */
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:rawvoice="http://www.rawvoice.com/rawvoiceRssModule/" version="2.0">
    <channel>
        @foreach($meta as $key => $metaItem)
            @if($key === 'link')
                <{{ $key }} href="{{ url('/podcast') }}"></{{ $key }}>
            @else
                <{{ $key }}>{{ $metaItem }}</{{ $key }}>
            @endif
        @endforeach
        <image>
            <url>https://itsallwidgets.com/images/podcast.jpg</url>
            <title>It's All Widgets! Flutter Podcast</title>
            <link>https://itsallwidgets.com/podcast</link>
        </image>
        <description>
            An ongoing series featuring some of the amazing developers from the Flutter community. In each episode we discuss the developer's background, what got them into Flutter and their thoughts on the platform in general.
        </description>
        <language>en-us</language>
        <atom:link href="https://itsallwidgets.com/podcast/feed" rel="self" type="application/rss+xml"/>
        <itunes:author>Hillel Coren</itunes:author>
        <itunes:summary>
            An ongoing series featuring some of the amazing developers from the Flutter community. In each episode we discuss the developer's background, what got them into Flutter and their thoughts on the platform in general.
        </itunes:summary>
        <itunes:subtitle>An open podcast for Flutter developers</itunes:subtitle>
        <itunes:owner>
            <itunes:name>Hillel Coren</itunes:name>
            <itunes:email>hillelcoren@gmail.com</itunes:email>
        </itunes:owner>
        <itunes:explicit>No</itunes:explicit>
        <itunes:keywords>
            flutter,google,programming,development,web,mobile,developer,software engineering,app
        </itunes:keywords>
        <itunes:image href="https://itsallwidgets.com/images/podcast.jpg"/>
        <itunes:category text="Technology"/>
        <itunes:category text="Education"/>
        @foreach($items as $item)
            <item>
                <title>{{ $item->title }}</title>
                <link href="{{ url(json_decode($item->link)[0]) }}" />
                <enclosure url="{{ url(json_decode($item->link)[1]) }}" type="audio/mpeg"/>
                <guid>{{ $item->id }}</guid>
                <author>
                    <name>{{ $item->author }}</name>
                </author>
                <description>
                    {!! $item->summary !!}
                </description>
                <itunes:summary>{!! $item->summary !!}</itunes:summary>
                <itunes:image href="https://itsallwidgets.com/images/podcast.jpg"/>
                <pubDate>{{ $item->updated->toAtomString() }}</pubDate>
                <itunes:explicit>No</itunes:explicit>
                <itunes:duration>{{ json_decode($item->link)[2] }}</itunes:duration>
                <itunes:keywords>
                    flutter,google,programming,development,web,mobile,developer,software engineering,app
                </itunes:keywords>
            </item>
        @endforeach
    </channel>
</rss>
