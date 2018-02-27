<?php
include('vendor\autoload.php');

new zingus\monotable();

$controls=array(
  0x18 => 'LoadSelectedTrack',  // load
  0x19 => 'keylock',            // lock
  0x1B => 'scratch',
  0x20 => 'beatsync',           // sync
  0x21 => 'bpm_tap',            // tap
  0x23 => 'play',
  0x22 => 'cue_default',        // cue
  0x24 => 'back',               // <<
  0x25 => 'fwd',                // >>
  0x26 => 'rate_perm_down',     // minus
  0x27 => 'rate_perm_up',       // plus
  0x10 => 'hotcue_1_activate',  // button 1
  0x11 => 'hotcue_2_activate',  // button 2
  0x12 => 'hotcue_3_activate',  // button 3
  0x13 => 'hotcue_4_activate',  // button 4
);

$controls_section='';
$outputs_section='';
for($i=0;$i<4;$i++) {
  foreach($controls as $notenum => $control) {
    $midistatuslist=array(0x90+$i,0x80+$i);
    foreach($midistatuslist as $midistatus) {
      $midistatus=sprintf('0x%02x',$midistatus);
      $controls_section.='';

    }
  }
}


$cm1pl_midi_xml='<?xml version="1.0" encoding="utf-8"?>
<MixxxMIDIPreset schemaVersion="1" mixxxVersion="1.11.0+">
  <info>
    <name>Behringer CMD PL-1</name>
    <author>Zingus J. Rinkle</author>
		<description>Behringer CMD PL-1 Controller</description>
    <wiki>http://www.mixxx.org/wiki/doku.php/behringer_cmd_pl_one</wiki>
    <forums>https://www.mixxx.org/forums/viewforum.php?f=7</forums>
  </info>
  <controller id="Behringer CMD PL-1">
    <scriptfiles>
      <file filename="CMD_PL-1.js" functionprefix="CmdPl1"/>
    </scriptfiles>
    <controls>'.controls_section().'
    </controls>
    <outputs>'.outputs_section().'
    </outputs>
  </controller>
</MixxxMIDIPreset>
';

file_put_contents('CMD_PL-1.midi.xml',$cm1pl_midi_xml);

function controls_section() {

}

function outputs_section() {

}

function control($control,$notenum,$channel_idx=0,$midistatus=0x90) {
  $channel = '[Channel'.($channel_idx+1).']';
  $midistatus = 0x90+$channel_idx;
  return "
      <control>
        <group>$channel</group>
        <key>$control</key>
        <status>$midistatus</status>
        <midino>$notenum</midino>
      </control>";
}
