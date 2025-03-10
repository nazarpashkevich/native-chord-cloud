import axios, { AxiosResponse } from 'axios';

class TrackService {
  public uploadTrack(
    track: File,
    playlistId: null | number = null,
  ): Promise<AxiosResponse> {
    const data = new FormData();
    data.append('path', track.path);
    data.append('track', track);
    if (playlistId) {
      data.append('playlist_id', playlistId);
    }

    return axios.post(route('media.track.upload'), data);
  }
}

export default new TrackService();
