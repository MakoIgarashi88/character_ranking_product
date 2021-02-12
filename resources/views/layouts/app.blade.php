<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <v-app id="app">
        <v-app-bar app color="secondary" dark dense absolute>
            <v-row justify="space-between">
                <v-col cols="auto">
                    <v-btn text to="/">
                        {{ config('app.name', 'Laravel') }}
                    </v-btn>
                </v-col>
                <v-col cols="auto">
                    <v-menu offset-y>
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn text v-bind="attrs" v-on="on" >
                                <v-icon>mdi-menu</v-icon>
                            </v-btn>
                        </template>

                        <v-list>
                        <v-list-item to="/ranking">
                                <v-list-item-title>ランキング一覧</v-list-item-title>
                            </v-list-item>
                            <v-list-item to="/ranking/create">
                                <v-list-item-title>ランキングを作る</v-list-item-title>
                            </v-list-item>
                            <v-list-item to="/character/search">
                                <v-list-item-title>キャラクターを探す</v-list-item-title>
                            </v-list-item>
                            <v-list-item to="/character/create">
                                <v-list-item-title>キャラクターを作る</v-list-item-title>
                            </v-list-item>
                        </v-list>
                    </v-menu>

                </v-col>
            </v-row>
        </v-app-bar>
        <main class="py-4">
            @yield('content')
                <main-component/>
        </main>
    </v-app>
</body>
</html>
