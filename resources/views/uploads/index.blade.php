<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Uploads') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <a href="{{route('uploads.create')}}">Add new Uploads</a>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Upload Id</th>
                            <th>Title</th>
                            <th>Username</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Caption</th>
                            <th>Average rating</th>
                            <th>Reviews</th>
                            <th>Saves</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                            <th>Tags</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($uploads as $upload)
                       <tr>
                        <td>
                        <a href="{{route('uploads.show',$upload)}}">{{$upload->id}}</a>    
                        </td>
                        <td>{{$upload->title}}</td> 
                        <td>{{$upload->user->name}}</td>
                        <td>{{$upload->category->catname}}</td>
                        @if($upload->imageurl)
                        <td>
                            <img src="{{asset('storage/'.$upload->imageurl)}}" style="width: 50px; height: auto;">
                            
                        </td>
                        @endif
                        <td>{{$upload->caption}}</td>
                        <td>{{$upload->average_rating}}</td>
                        <td>{{$upload->reviews}}</td>
                        <td>{{$upload->saves}}</td>
                        <td>{{$upload->created_at}}</td>
                        <td>{{$upload->updated_at}}</td>
                        
                       
                       <td><a href="{{route('uploads.edit',$upload)}}">Edit</a>/
                            <form action="{{route('uploads.destroy',$upload)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="confirm('Are you sure?')">Delete</button>
                            </form>
                        
                        </td>
                        <td>
                        @if($upload->tags->count()>0)
                        @foreach($upload->tags as $tag)
                        {{$tag->tag}}<br>
                        @endforeach
                        @else
                        No tags
                        @endif

                        </td>
                        </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
