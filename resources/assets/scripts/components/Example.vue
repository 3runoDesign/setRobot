<template>
    <div>
        <content class="container has-text-centered">
            <div class="hero is-fullheight">
                <div class="hero-body">
                    <div class="container has-text-centered">
                        <h1 class="title">
                            Hello, I'm <span>setRobot</span>!
                        </h1>

                        <p class="description">
                            Nice to see you!<br>Let's make something amazing using Wordpress!
                        </p>
                        <div class="tabs is-centered">
                            <ul>
                                <li><a href="https://github.com/3runoDesign/setRobot/issues/new" target="_blank">Issues</a></li>
                                <li><a href="https://github.com/3runoDesign/setRobot/wiki" target="_blank">Documentation</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="hero-foot">
                    <div class="container">
                        <div class="tabs is-centered">
                            <ul>
                                <li><a href="https://github.com/roots/sage" target="_blank">Sage</a></li>
                                <li><a href="https://github.com/JeffreyWay/laravel-mix" target="_blank">Laravel-Mix</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </content>
    </div>
</template>

<style lang="scss">
    $color_splash_hero: #554899;
    $color_second_hero: #ffd84d;

    body {
        font-family: 'Varela Round', sans-serif;
        background: linear-gradient(to bottom right, lighten($color_splash_hero, 20%) 0%, $color_splash_hero 100%);
    }

    .tabs a {
        color: $color_second_hero;
    }

    .title {
        color: $color_second_hero;
        font-size: 4em;

        span {
            border-bottom: 6px solid lighten($color_second_hero, 30%);
        }
    }

    .description {
        font-size: 1.25em;
        color: lighten($color_splash_hero, 50%);
    }

</style>


<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
