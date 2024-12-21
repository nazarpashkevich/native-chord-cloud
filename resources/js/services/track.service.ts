import axios from "axios";

export class TrackService {
    protected instance: TrackService;

    private constructor() {
    }


    public static make(): TrackService {
        this.instance ??= new TrackService();

        return this.instance;
    }

    public uploadTrack(track: File): Promise<void> {
        console.log('track', track);
        const data = new FormData();
        data.append('track', track.path);

        axios.post(route('media.track.upload'), data);
    }
}