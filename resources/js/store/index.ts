import { createStore } from 'vuex';
import playerStore from "@/store/modules/player.store";

export default createStore({
    modules: {
        playerStore,
    },
});
