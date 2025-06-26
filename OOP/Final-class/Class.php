<?php
// final class--> class tersbut tidak dapat diturunkan lagi
// tidak bisa membuat class child lagi atau akan error
class SocialMedia
{
    public string $name;
}
final class Facebook extends SocialMedia
{
}

// error
// class FakeFacebook extends Facebook
// {
// }