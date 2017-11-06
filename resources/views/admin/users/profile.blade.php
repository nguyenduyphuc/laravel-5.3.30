@extends('admin.templates.default', ['title'=>'User Profile',
            'libs_elements'=>['node-waves', 'animate','bootstrap-select','dataTables'],
            'customs_css'=>[
                URL::asset('/admin/css/users/upload-avatar.css'),
            ],
            'custom_scripts'=>[
                URL::asset('/admin/js/admin.js'),
                URL::asset('admin/js/pages/users/upload-avatar.js')
            ]
            ])
@section('content')
            <div class="block-header">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Profile</h3>
                        <small>Show user data in clear profile design</small>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4 col-lg-offset-7">
                                    <ul class="list-inline">
                                        <li><div class="demo-google-material-icon"> <i class="material-icons" style="font-size: 20px;">email</i> <span class="icon-name"></span></div></li>
                                        <li><span class=""><div class="demo-google-material-icon"> <i class="material-icons" style="font-size: 20px;">import_contacts</i> <span class="icon-name"></span></div></span></li>
                                        <li><div class="demo-google-material-icon"> <i class="material-icons" style="font-size: 20px;">phone</i> <span class="icon-name"></span> </div></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 imgHover" >
                                    <img src="{{isset(Auth::user()->getMedia()[0])==false ?asset('avatar.png'): asset(Auth::user()->getMedia()[0]->getUrl())}}"  width="120" height="120" alt="User profile">

                                    <form class="form-avatar" action="{{url('admin/user/upload-avatar')}}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="file" name="avatar">
                                        <button type="submit">Upload</button>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>{{Auth::user()->name}}</h3>
                                    <p>{{Auth::user()->email}}</p>
                                    <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan.</small>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"
                                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                                            60% Complete (info)
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <dt>Description lists</dt>
                                    <dd>A description list is perfect for defining terms.</dd>
                                    <dt>Euismod</dt>
                                    <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                                    <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                                    <dt>Malesuada porta</dt>
                                    <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                </div>
                            </div>
                            <div class="panel-footer contact-footer">
                                <div class="row">
                                    <div class="col-lg-4" style="border-right: 1px solid #e4e5e7; ">
                                        <div class="contact-stat">
                                            <span>Project</span>
                                            <strong>100</strong>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" style="border-right: 1px solid #e4e5e7; ">
                                        <div class="contact-stat">
                                            <span>Topics</span>
                                            <strong>20</strong>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="contact-stat">
                                            <span>Comments</span>
                                            <strong>500</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Orders</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
                            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <div class="header">
                                                <h2>
                                                    EXPORTABLE TABLE
                                                </h2>
                                                <ul class="header-dropdown m-r--5">
                                                    <li class="dropdown">
                                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                            <i class="material-icons">more_vert</i>
                                                        </a>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li><a href="javascript:void(0);">Action</a></li>
                                                            <li><a href="javascript:void(0);">Another action</a></li>
                                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="body">
                                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                    <thead>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Addon</th>
                                                        <th>User</th>
                                                        <th>Download</th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th>STT</th>
                                                        <th>Addon</th>
                                                        <th>User</th>
                                                        <th>Download</th>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>
                                                    @if($orders!=null)
                                                    @foreach($orders as $order)
                                                        <tr>
                                                            <td>1</td>
                                                            <td>{{$order->addon->name}}</td>
                                                            <td>{{$order->user->name}}</td>
                                                            <td><a href="#" title="">download</a></td>
                                                        </tr>
                                                    @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="profile">...</div>
                            <div role="tabpanel" class="tab-pane" id="messages">...</div>
                            <div role="tabpanel" class="tab-pane" id="settings">...</div>
                        </div>

                    </div>
                </div>
            </div>

@stop