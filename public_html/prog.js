$(function() {
  'use strict'; // より厳密なエラーチェック

  // $('#new_prog').focus(); // title入力欄にfocusする

  // update
  $('#progs').on('click', '.update_prog', function() {
    // checkbox(.update_prog)がクリックされたprogのidを取得
    var id = $(this).parents('li').data('id');
    // ajax処理
    $.post('../lib/Model/_ajax.php', { // _ajax.phpを読み込み→post()→$resが返る
      id: id, // idとしてidを
      mode: 'update', // modeとして'更新'を渡す
      token: $('#token').val(),
      stateNum: $(this).data('stateNum')
    }, function(res) { // その後 doneつけ
      // // if (!(res.state_p === '0' || res.state_m === '0' || res.state_y === '0' || res.state_f === '0'))
      // if (res.state_p === '1' && res.state_m === '1' && res.state_y === '1' && res.state_f === '1') {
      // // if (res.state_p === '1' && res.state_m === '1')
      //   $('#prog_' + id).find('.prog_title').addClass('done');
      // } else {
      //   $('#prog_' + id).find('.prog_title').removeClass('done');
      // }
    })
  });

  // delete
  $('#progs').on('click', '.delete_prog', function() {
    // x印(.delete_prog)がクリックされたprogのidを取得
    var id = $(this).parents('li').data('id');
    // var title = $('.prog_title').text();
    var title = $('#prog_' + id + ' > .prog_title').text(); // 返される文字列は、条件に一致する全ての要素が子孫にいたるまで持っているテキストを結合したものになる。らしい。
    // console.log(id);
    // console.log(title);

    // ajax処理
    if (confirm(title + ' を本当に削除しますか？')) {
      $.post('../lib/Model/_ajax.php', { // _ajax.phpを読み込み
        id: id, // idとしてidを
        mode: 'delete', // modeとして'削除'を渡す
        token: $('#token').val()
      }, function() { // その後
        $('#prog_' + id).fadeOut(800); // idのついたliを消す
      })
    }
  });

  // delete at once
  $('#deleteAtOnce').click(function() {
    var ids = [];

    // x印を消して、チェックボックスを現す
    $('.delete_prog').hide();
    $('.delete_checkbox').show();
    $('#deleteAtOnce').hide();
    $('#deleteAtOnce2').show();
    //console.log('clicked');

    $('#progs').on('click', '.delete_checkbox', function() {
      // チェックされたののidをidsに保つ（外されたののidは捨てつつ）
      var id = $(this).parents('li').data('id'); // チェックされたprogのidを取得
      $('#prog_' + id).toggleClass("list-group-item-info");
      if($.inArray(id, ids) < 0){ // もし存在してなかったら
        ids.push(id);
      } else {
        var num = $.inArray(id, ids); // そのidはnum番目にある
        ids.splice(num, 1); // idsのnum番目から1つ削除
      }
      ids.sort( // 降順ソート
        function(a,b){
          return (a < b ? 1 : -1);
        }
      );
      //console.log(ids);
    });

      $('#deleteAtOnce2').click(function() {
        // confirm_textをつくる
        var confirm_text = $('#prog_' + ids[0] + ' > .prog_title').text();
        for (var i = 1; i < ids.length; i++) {
          confirm_text += ' , ' + $('#prog_' + ids[i] + ' > .prog_title').text();
        }
        confirm_text += ' を本当に削除しますか？';

        if (ids.length === 0) {
          alert('削除する番組を選択してください！');
        } else {
          // ajax処理
          if (confirm(confirm_text)) {
            // 保ってたidでひとつずつ繰り返しdeleteしていく
            $.each(ids, function(index, val) {
              $.post('../lib/Model/_ajax.php', { // _ajax.phpを読み込み
                id: val, // idとしてidを
                mode: 'delete', // modeとして'削除'を渡す
                token: $('#token').val()
              }, function() { // その後
                $('#prog_' + val).fadeOut(800); // idのついたliを消す
                ids = [];
              });
            });
          }
        }
      });

  });

  // create
  $('#new_prog_form').on('submit', function() {
    // titleを取得
    var title = $('#new_prog').val();
    var groupid = $('#groupid').text();
    // ajax処理
    $.post('../lib/Model/_ajax.php', { // _ajax.phpを読み込み
      title: title,
      mode: 'create', // modeとして'create'を渡す
      groupid: groupid,
      token: $('#token').val()
    }, function(res) { // その後
      // liを追加
      var $li = $('#prog_template').clone();
      $li
        .attr('id', 'prog_' + res.id) // id属性
        .data('id', res.id) // data属性
        .find('.prog_title').text(title); // .prog_titleを探し、上で設定したtitleに書き換え
      $('#progs').prepend($li.fadeIn()); // prepend(一番上)に追加
      $('#new_prog').val('').focus(); // title入力欄にfocusする
    })
    return false; // 画面の遷移を防ぐ
  });



});
