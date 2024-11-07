<x-app-layout>
    
    <div class="flex flex-col justify-center items-center h-full">
            <div id='teacher'>
                <div id="content-coment">
                    <div id='work'>
                        <h2 class="headline">今週の宿題</h2>
                        @if(is_null($works))
                            <p class='work_content'>宿題が出るよ</p>
                        @else
                            <p class='work_content'>{{ $works->content }}</p>
                        @endif
                    </div>
                    
                    <div id='advice'>
                        <h2 class="headline">コメント</h2>
                        @if(is_null($works))
                            <p class='work_coment'>adviceを待ちましょう</p>
                        @else
                            <p class='work_coment'>{{ $works->coment }}</p>
                        @endif
                    </div>
                </div>
            </div>
            
            <hr>
            
            <div id="student">
                <div id='plans'>
                    <h2 class="headline">今週の計画</h2>
                    <button id="plan_button" type=“button” onclick="location.href='/plans/create'"><!-- onclick についてわかっていない -->
                        計画を立てる
                    </button>
                    
                    @if (is_null($plans1) && is_null($plans2) && is_null($plans3) && is_null($plans4) && is_null($plans5) && is_null($plans6) && is_null($plans7))
                            
                        <table border="2">
                            <tr>
                                <th>日</th>
                                <th>月</th>
                                <th>火</th>
                                <th>水</th>
                                <th>木</th>
                                <th>金</th>
                                <th>土</th>
                            </tr>
                            <tr>
                                    <td colspan="7"><p>学習予定を立てよう！</p></td>
                            </tr>
                        </table>
                    
                    @else
                        <table>
                            <tr>
                                <th>日</th>
                                <th>月</th>
                                <th>火</th>
                                <th>水</th>
                                <th>木</th>
                                <th>金</th>
                                <th>土</th>
                            </tr>
                            <tr>
                                <td>
                                    @if(is_null($plans1->content))
                                    <p class='table_item'>お休み</p>
                                    @else
                                    <p class='table_item'>{{ $plans1->content }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if(is_null($plans2->content))
                                    <p class='table_item'>お休み</p>
                                    @else
                                    <p class='table_item'>{{ $plans2->content }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if(is_null($plans3->content))
                                    <p class='table_item'>お休み</p>
                                    @else
                                    <p class='table_item'>{{ $plans3->content }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if(is_null($plans4->content))
                                    <p class='table_item'>お休み</p>
                                    @else
                                    <p class='table_item'>{{ $plans4->content }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if(is_null($plans5->content))
                                    <p class='table_item'>お休み</p>
                                    @else
                                    <p class='table_item'>{{ $plans5->content }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if(is_null($plans6->content))
                                    <p class='table_item'>お休み</p>
                                    @else
                                    <p class='table_item'>{{ $plans6->content }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if(is_null($plans7->content))
                                    <p class='table_item'>お休み</p>
                                    @else
                                    <p class='table_item'>{{ $plans7->content }}</p>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    
                        <button type=“button” onclick="location.href='/submits/create'">
                            提出
                        </button>

                    @endif
                    
                </div>
            </div>
    </div>
</x-app-layout>