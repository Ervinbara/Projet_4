import * as AlloyEvents from '../../api/events/AlloyEvents';
import * as SystemEvents from '../../api/events/SystemEvents';
import * as NativeEvents from '../../api/events/NativeEvents';
import { FocusingConfig } from '../../behaviour/focusing/FocusingTypes';
import * as DomModification from '../../dom/DomModification';
import * as FocusApis from './FocusApis';

// TODO: DomModification types
const exhibit = (base: { }, focusConfig: FocusingConfig): any => {
  const mod = focusConfig.ignore ? { } : {
    attributes: {
      tabindex: '-1'
    }
  };

  return DomModification.nu(mod);
};

const events = (focusConfig: FocusingConfig): AlloyEvents.AlloyEventRecord => {
  return AlloyEvents.derive([
    AlloyEvents.run(SystemEvents.focus(), (component, simulatedEvent) => {
      FocusApis.focus(component, focusConfig);
      simulatedEvent.stop();
    })
  ].concat(focusConfig.stopMousedown ? [
    AlloyEvents.run(NativeEvents.mousedown(), (_, simulatedEvent) => {
      // This setting is often used in tandem with ignoreFocus. Basically, if you
      // don't prevent default on a menu that has fake focus, then it can transfer
      // focus to the outer body when they click on it, which can break things
      // which dismiss on blur (e.g. typeahead)
      simulatedEvent.event().prevent();
    })
  ] : [ ]));
};

export {
  exhibit,
  events
};