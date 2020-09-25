<table class="table table-dark" style="width: 30px;>
                         <thead class="bg-light">
                             <tr>
                                 <th scope="col" class="border-0" style="width: 5%"></th>
                                 <th scope="col" class="border-0">ID</th>
                                 <th scope="col" class="border-0">Name</th>
                                 <th scope="col" class="border-0">Price</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($food as $s)
                             <tr>
                                 <td style="width: 5%"></td>
                                 <td align="left" style="font-size: 14px">{{$s->id}}</td>
                                 <td style="font-size: 14px">{{$s->name}}</td>
                                  <td style="font-size: 14px">{{$s->price}}</td>
                                 <td>
                                     <button class="btn btn-outline-info btn-sm" style="padding: 0 7px " ><a href="{{route('topicDetails',$s->id)}}"><i class="fas fa-eye"></i></a></button>
                                 </td>
                                 <td style="width: 5%"></td>
                             </tr>
                             @endforeach
                         </tbody>
                     </table>