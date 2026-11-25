const php = @import("root.zig");
const Class = php.Class;
const Object = php.Object;
const Value = php.Value;

pub fn _(comptime T: type) type {
    return Object.Custom(struct {
        pub const @"use auto registration" = "zpx/internal/Proxy(" ++ @typeName(T) ++ ")";

        pub fn deinit(self: *@This()) void {
            self.source_object.release();
        }

        pub fn readDimension(self: *@This(), key: Value, _: Value.Access) !Value {
            _ = self;
            _ = key;
            return .fromNull();
        }

        pub fn hasDimension(self: *@This(), key: Value, _: bool) !bool {
            _ = self;
            _ = key;
            return false;
        }

        pub fn writeDimension(self: *@This(), key: Value, value: Value) !void {
            php.print("writeDimension\n", .{});
            _ = self;
            _ = key;
            _ = value;
        }

        pub fn unsetDimension(self: *@This(), key: Value) !void {
            _ = self;
            _ = key;
        }

        pub fn countElements(self: *@This()) usize {
            _ = self;
            return 0;
        }

        source_object: *Object = undefined,
        target: *T = undefined,
    });
}
