<x-layout>
    <div class="container p-2 bg-gradient bg-primary shadow mb-4">
        <div class="row text-center">
            <div class="col-12 text-light p-3">
                <h1 class="display-4">{{__('ui.explorecategory')}} {{$category->name}}</h1>
            </div>
        </div>
    </div>
    
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <div class="row text-center">
                    @forelse($category->announcements as $announcement)
                    <div class="col-12 col-md-3 my-2">
                        <div class="card">
                            <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(400,400) : 'https://picsum.photos/200'}}" class="card-img-top p-3 rounded" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$announcement->title}}</h5>
                                <p class="card-text">{{substr($announcement->body , 0 , 25)}}...</p>
                            </div>
                            <ul class="list-group list-group-flush align-items-center d-flex">
                                <a class="btn btn-primary btn-custom-display shadow" href="{{route('announcement.show' , compact('announcement'))}}" alt="...">{{__('ui.view')}}</a>
                                <a class="my-2 pt-2 text-decoration-none btn-custom-category text-dark" href="{{ route('categoryShow' , ['category'=> $announcement->category]) }}"><li class="list-group-item">
                                    {{__('ui.allCategory2')}} {{$announcement->category->name}}</li></a>
                                <li class="list-group-item">{{ $announcement->price }}€</li>
                              </ul>
                            <div class="card-body">
                                <li class="list-group-item"><p class="card-footer">{{__('ui.publishedon')}} {{ $announcement->created_at->format('d/m/Y') }}<br> {{__('ui.createby')}} {{$announcement->user->name ?? ''}}</p></li>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="container">
                        <div class="row vuotazione altezzarevis">
                            <div class="col-12">
                                <h2>{{__('ui.zeroannouncement')}} </h2>
                                <a href="{{route('announcement.create')}}" class="btn btn-primary shadow">{{__('ui.createnewannouncement')}}</a>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    
</x-layout>