<template>
    <div class="container">
        <!-- <div class="card timeline-news" v-for="recent in news">
            <div class="card-img-top">
                <div class="timeline-news-tap-to-play">
                    <img class="tap-svg" src="/assets/tap.svg"/>
                    Tap to play!
                </div>
                <img class="timeline-image-top" :src="recent.img" :alt="recent.title">
            </div>
            <div class="timeline-news-source-logo">
                <img class="timeline-news-source-logo-img" :src="recent.source.logo" :alt="recent.source.name"/>
            </div>
            <h4 class="timeline-news-title card-title">
                {{ recent.title }}
            </h4>

            <a :href="recent.source.url" class="timeline-news-more">
                &gt;&gt; Mehr zum Thema &lt;&lt;
            </a>
        </div> -->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                news: [
                    {
                        title: 'Belgien stürmt ins Halbfinale',
                        img: 'http://cdn4.spiegel.de/images/image-1312487-860_poster_16x9-mtci-1312487.jpg',
                        source: {
                            name: 'Spiegel-Online',
                            url: 'http://www.spiegel.de/sport/fussball/a-1217170.html',
                            logo: '/assets/logos/spiegel_online.svg'
                        }
                    },
                    {
                        title: 'Razzia in Gelsenkirchen: Polizei und Zoll durchsuchen Häuser',
                        img: 'https://img.wr.de/img/archiv-daten/crop214783955/4242222817-w940-cv23_11-q85/gelsenkirchenfotos.jpg',
                        source: {
                            name: 'WR: Westfalische Rundschau',
                            url: 'https://www.wr.de/staedte/gelsenkirchen/id214783789.html',
                            logo: '/assets/logos/westfalische_rundschau.svg'
                        }
                    },
                    {
                        title: 'Eurojackpot geknackt!',
                        img: 'https://pbs.twimg.com/media/DhaGjZJX4AAlqV1.jpg',
                        source: {
                            name: 'TAZ',
                            url: 'https://www.tz.de/welt/zr-10014468.html',
                            logo: '/assets/logos/dietageszeitung.svg'
                        }
                    }
                ]
            };
        }
    };
</script>

<style scoped>
    .timeline-news {
        max-width: 798px;
        min-height: 162px;
        margin: 10px auto 10px auto;
        position: relative;
    }
    .timeline-image-top {
        width: 100%;
    }
    .timeline-news-title {
        padding: 5px;
    }
    .timeline-news-more {
        text-align: center;
        padding: 5px;
        cursor: pointer;
        color: #004888;
    }
    .timeline-news-source-logo-img {
        padding: 5px;
        height: 24px;
    }
    .timeline-news-tap-to-play {
        position: absolute;
        color: white;
        text-align: center;
        width: 100%;
        top: 40%;
        transform: translateY(-50%);
        font-size: 48px;
        background-color: darkgray;
        opacity: 0.6;
        padding: 10px 0 10px 0;
    }
    .tap-svg {
        width: 48px;
    }
</style>
