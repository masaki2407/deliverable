<!DOCTYPE HTML>
<x-app-layout>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>出席管理</title>
    </head>
    <body>
        <div>
            <h1 class="text-center text-0xl">出席管理</h1>
        </div>
        
        <div class="management2">
            <div class="flex justfy=center items=center gap=4">
                <form action="/posts" method="POST" class="management">
                    @csrf
                    <input type="hidden" name="post[category_id]" value =1>
                    <button class="w-12 h-12 bg-blue-400 text-lg text-white font-semihold rounded-full hover:bg-blue-500" type ="submit">出席</button>
                    <input type="hidden" name="post[category_id]" value =2>
                    <button class="w-12 h-12 bg-blue-400 text-lg text-white font-semihold rounded-full hover:bg-blue-500" type ="submit">欠席</button>
                    <input type="hidden" name="post[category_id]" value =3>
                    <button class="w-12 h-12 bg-blue-400 text-lg text-white font-semihold rounded-full hover:bg-blue-500" type ="submit">遅刻</button>
                    <input type="hidden" name="post[category_id]" value =4>
                    <button class="w-12 h-12 bg-blue-400 text-lg text-white font-semihold rounded-full hover:bg-blue-500" type ="submit">公欠</button>
                </form>
            </div>
        </div>
        <div class="overflow-scroll">
            @foreach($posts as $post)
            <div class="flex space-x-4">
            <div>{{$post->category->management}}</div>
            <div>{{$post->created_at}}</div>
            <a href="/posts/{{ $post->id }}/edit">edit</a>
            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
            @csrf
            @method('DELETE')
            <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
            </form>
            </div>
            @endforeach
        </div>
        <div>
            '出席'{{$management1}}
        </div>
        <div>
            '欠席'{{$management2}}
        </div>
        <div>
            '遅刻'{{$management3}}
        </div>
        <div>
            '公欠'{{$management4}}
        </div>
        <h2 class='title'>
            <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
        </h2>
    </body>
    <script>
            function deletePost(id) {
            'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
</html>
</x-app-layout>
