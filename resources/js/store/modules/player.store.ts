export default {
    namespaced: true,
    state: () => ({
        isPlaying: false,
        currentTime: 0,
        duration: 0,
        volume: 0.8,
    }),
    mutations: {
        setCurrentTime(state, time: number) {
            state.currentTime = time;
        },
        setDuration(state, time: number) {
            state.duration = time;
        },
        setVolume(state, volume: number) {
            state.volume = volume;
        },
        setIsPlaying(state, isPlaying: boolean) {
            state.isPlaying = isPlaying;
        },
    },
    actions: {},
};
