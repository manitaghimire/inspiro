<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Uploads') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                
                        @csrf    
                        @method('PUT')       
                        <b>Title:</b><br>
                        {{$upload->title}}
                        <br><br>      

                        <b>Description:</b><br>
                        {{$upload->caption}}<br><br>                    
            

                        <b>Image: </b><br/>
                        @if ($upload->imageurl)
                                <img src="{{ asset('storage/' . $upload->imageurl) }}" alt="Icon" style="width: 100px; height: auto;"><br>
                            
                            @endif
                        <br><br>

                        <b>Category</b>
                        {{$upload->category->catname}}
                        <br><br>

                        

                        <b>Link:</b><br>
                        {{$upload->link}}
                       <br><br>

                        <b>Tags:</b><br>
                        <div id="tag-container">
                        @if ($tags && $tags->count() > 0)
                                @foreach ($tags as $tag)
                                <div style="margin-bottom: 10px;">
                                {{$tag->tag}}                                
</div>
                                @endforeach
                                
                            @endif
                        </div>
                        <br>
                        <button type="" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                       Like
                    </button>
                   
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
