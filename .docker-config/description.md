# Local docker registry

auths: This object contains the registry URLs you have logged into.

auth: This is a Base64 encoded string of your username:password or username:token.

Warning: Base64 is not encryption. Anyone with access to this file can easily decode it to see your plain-text password using the command: echo "YWRtaW46..." | base64 --decode.

HttpHeaders: Stores metadata about the Docker client used to perform the login.

credsStore (Optional): If you are using a credential helper (like osxkeychain or wincred), this file might not show the auth string; instead, it will point to your system's secure vault.

´´´
    docker --config ./.docker-config info | grep "Registry"
´´´

If you are logging into the standard Docker Hub, the entry in your config.json will usually appear as [DockerHub](https://index.docker.io/v1/.)
