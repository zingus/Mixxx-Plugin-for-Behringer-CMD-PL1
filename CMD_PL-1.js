var CmdPl1={};

CmdPl1.deck_controls={
'play_indicator':0x23,
'back':0x24,
'fwd':0x25,
'cue_indicator':0x22
}

/*CmdPl1.init = function (id, debugging) {
  print(this)
  print(this.deck_controls['back'])
  this.main_timer=engine.beginTimer(100,"CmdPl1.refreshLeds");
  for(i=0;i<4;i++) {
    var chan='[Channel'+(i+1)+']';
    for(param in this.deck_controls) {
      midi.makeInputHandler([0x90+i,this.deck_controls[param]],CmdPl1.handler);
    }
  }
};

CmdPl1.shutdown = function (id, debugging) {
};

CmdPl1.handler = function (input) {
  print(input);
}

CmdPl1.refreshLeds = function () {


  for(i=0;i<4;i++) {
    var chan='[Channel'+(i+1)+']';

    for (var param in this.deck_controls) {
      var value=engine.getParameter(chan,param);
      midi.sendShortMsg(0x90+i, this.deck_controls[param], value);
    }

    /*var play=engine.getParameter(chan,'play');
    if(!play && engine.getParameter(chan,'track_samples') > 0) play=2;
    midi.sendShortMsg(0x90+i, 0x23, play);
    */
   
  }
}

/*
 *       
*/
